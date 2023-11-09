<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckinRideRequest extends FormRequest
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
            'ride_id' => 'required|numeric',
            'code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ride_id.required' => 'Wahana harus diisi',
            'code.required' => 'Kode tiket harus diisi',
        ];
    }
}
