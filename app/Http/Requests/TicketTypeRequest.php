<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketTypeRequest extends FormRequest
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
            'price' => 'required|numeric',
            'fee' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'price.required' => 'Harga harus diisi',
            'price.numerik' => 'Harga harus angka',
            'fee.required' => 'Fee harus diisi',
            'fee.numerik' => 'Fee harus angka',
            'image.mimes' => 'Format gambar harus .jpeg, .png, .jpg',
            'image.max' => 'Maksimal ukuran gambar 2000kb',
        ];
    }
}
