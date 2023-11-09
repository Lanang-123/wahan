<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingRequest extends FormRequest
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
            'car_type_id' => 'required|numeric',
            'police_number' => 'required|numeric',
            'country' => 'nullable',
            'total_passengers' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'car_type_id.required' => 'Jenis Kendaraan harus diisi',
            'police_number.required' => 'Nomor polisi kendaraan harus diisi',
            'total_passengers.required' => 'Jumlah penumpang harus diisi',
            'country.required' => 'Asal negara harus diisi',
        ];
    }
}
