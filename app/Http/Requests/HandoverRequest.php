<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandoverRequest extends FormRequest
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
            'name' => 'required',
            'type' => 'required',
            'product_items' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'type.required' => 'Harga harus diisi',
            'product_items.required' => 'Item produk harus diisi',
        ];
    }
}
