<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'province' => 'required|max:255',
            'quantity' => 'required|numeric|max:100000',
            'quantity_unit' => 'required|max:255',
            'price' => 'required|numeric|max:900000',
            'price_unit' => 'required|max:255',
            'title' => 'required|max:255',
            'additional_information' => 'required|max:255',
            'product_images' => 'required',
            'product_images.*'  => 'image|mimes:jpg,jpeg,png',
        ];
    }
}
