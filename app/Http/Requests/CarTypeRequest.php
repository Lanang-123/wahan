<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarTypeRequest extends FormRequest
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
            'name' => 'required|unique:car_types,name,' . $this->id,
            'price' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'price.required' => 'Harga harus diisi',
            'price.numerik' => 'Harga harus angka',
        ];
    }
}
