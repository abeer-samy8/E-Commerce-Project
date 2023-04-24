<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'title'=>'required|unique:products',
            // 'details' => 'nullable',
            // 'main_image' => 'required',
            // 'images' => 'required',
            // 'category_id' => 'required',
            // 'store_id' => 'required',
            // 'currency_id' => 'required',
            // 'regular_price' => 'required',
            // 'sale_price' => 'nullable',
            // 'active' => 'required',
            // 'quantity' => 'required'


        'title' => 'required|string',
        'details' => 'nullable|string',
        'main_image' => 'required|image',
        'images' => 'nullable|string',
        'category_id' => 'required|integer',
        'store_id' => 'required|integer',
        'currency_id' => 'required|integer',
        'regular_price' => 'required|integer',
        'sale_price' => 'nullable|integer',
        'active' => 'required|boolean',
        'quantity' => 'required|integer'

        ];
    }
}
