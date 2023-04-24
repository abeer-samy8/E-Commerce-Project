<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
        $id = $this->route('product');
        return [
        'title'=>'required|unique:products,title,' . $id . ',id',
        'details' => 'nullable|string',
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
