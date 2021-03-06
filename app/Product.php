<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravelista\Comments\Commentable;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    use Commentable;

    protected $fillable = [
        'name',
        'province',
        'quantity',
        'quantity_unit',
        'price',
        'price_unit',
        'title',
        'additional_information',
    ];

    protected $appends = [
        'diff_for_humans',
        'public_date',
    ];

    protected $with = [
        'user'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function getDiffForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getPublicDateAttribute()
    {
        $thai_months = [
            1 => 'ม.ค.',
            2 => 'ก.พ.',
            3 => 'มี.ค.',
            4 => 'เม.ย.',
            5 => 'พ.ค.',
            6 => 'มิ.ย.',
            7 => 'ก.ค.',
            8 => 'ส.ค.',
            9 => 'ก.ย.',
            10 => 'ต.ค.',
            11 => 'พ.ย.',
            12 => 'ธ.ค.',
        ];
        $date = Carbon::parse($this->created_at);
        $month = $thai_months[$date->month];
        $year = $date->year + 543;
        return $date->format("j $month $year");
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->id();
        });
    }
}
