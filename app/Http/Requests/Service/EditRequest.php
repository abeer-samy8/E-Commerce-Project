<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
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
            'title'=>'required|max:100',
            'summary'=>'required|max:255',
            'active'=>'max:1',
            'image'=>'image'
        ];
    }
}
