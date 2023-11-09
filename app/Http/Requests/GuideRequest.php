<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuideRequest extends FormRequest
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
            'id_card_number' => 'unique:guides,id_card_number,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'id_card_number.unique' => 'Nomor KTP sudah terdaftar',
        ];
    }
}
