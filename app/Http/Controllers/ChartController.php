<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\FruitChart;
use App\Product;
use App\product_count;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index($fruit)
    {
        $dataset = $this->avgFruitPrice($fruit);

        $chart = new FruitChart;
        $chart->labels($dataset['label']);
        $chart->dataset($fruit, 'line', $dataset['price'])->color('#3490dc');

        return view('chart.index', [
            'chart' => $chart,
            'dataset' => $dataset
        ]);
    }

    public function avgFruitPrice($fruit)
    {
        $dataset = [];
        $label = [];
        $collection = [];

        for ($i=15; $i >= 0; $i--) {
            $date = Carbon::now();
            $product_count = Product::where('name', $fruit)->whereDate('created_at', $date->subDays($i)->toDateString())->avg('price');
            array_push($dataset, $product_count ? $product_count : 0);
            array_push($label, $date->format('d/m'));
            $collection[$i] = [
                'price' => $product_count ? $product_count : 0,
                'label' => $date->format('d/m/Y')
            ];
        }

        $data['label'] = $label;
        $data['price'] = $dataset;
        $data['collection'] = $collection;

        return $data;
    }

}
