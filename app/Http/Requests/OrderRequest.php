<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'orders' => 'required|array',
            'use_guide' => '', 
            'guide_id' => 'required_if:use_guide,on'
        ];
    }

    public function messages()
    {
        return [
            'orders.required' => 'produk belum ditambahkan',
        ];
    }
}
