<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVecfleetVehicleRequest extends FormRequest
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
            'id_type' => 'required',
            'wheels' => 'required',
            'id_brand' => 'required',
            'model' => 'required',
            'patent' => 'required',
            'chassis' => 'required',
            'km_traveled' => 'required'
        ];
    }
}
