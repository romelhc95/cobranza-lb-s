<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->input('edit_boolean') == 1) {
            return [
                'document' => 'sometimes|required|max:3',
                'document_number' => 'sometimes|required|between:8,11',
                'first_name' => 'required|alpha|between:2,20',
                'last_name' => 'required|alpha|between:2,20',
                'second_last_name' => 'required|alpha|between:2,20',
                'phone' => 'required|numeric',
                'password' => 'required|min:6',
                'address' => 'required|between:6,255',
                'sector_id' => 'required|not_in:1',
            ];
        }

        return [
            'document' => 'sometimes|required|max:3',
            'document_number' => 'sometimes|required|unique:users,document_number|between:8,11',
            'first_name' => 'required|alpha|between:2,20',
            'last_name' => 'required|alpha|between:2,20',
            'second_last_name' => 'required|alpha|between:2,20',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
            'address' => 'required|between:6,255',
            'sector' => 'required|not_in:1',
        ];
    }

    public function messages()
    {
        return [
            'document.required'      => 'El documento es obligatorio',
            'document.max'         => 'El documento debe contener :max caracteres',
            'document_number.required'      => 'El numero de documento es obligatorio',
            'document_number.unique'      => 'El numero de documento ya se encuentra registrado en el sistema',
            'document_number.between'         => 'El documento debe contener entre :min si es un DNI y :max si es un RUC',
            'first_name.required'      => 'El primer nombre es obligatorio',
            'first_name.alpha' => 'El primer nombre solo debe contener letras',
            'first_name.between'         => 'El primer nombre debe contener como minimo :min caracteres',
            'last_name.required'      => 'El primer apellido es obligatorio',
            'last_name.alpha' => 'El primer apellido solo debe contener letras',
            'last_name.between'         => 'El primer apellido debe contener como minimo :min caracteres',
            'second_last_name.required'      => 'El segundo apellido es obligatorio',
            'second_last_name.alpha' => 'El segundo apellido solo debe contener letras',
            'second_last_name.between'         => 'El segundo apellido debe contener como minimo :min caracteres',
            'phone.required'      => 'El telefono es obligatorio',
            'phone.numeric' => 'El telefono solo debe numeros',
            'password.required'      => 'La contraseña es obligatoria',
            'password.min'         => 'La contraseña debe contener como minimo :min caracteres',
            'address.required'      => 'La dirección es obligatorio',
            'address.between'         => 'La dirección debe contener entre :min y :max caracteres',
            'sector_id.not_in'      => 'El sector es obligatorio',
            'sector.not_in'      => 'El sector es obligatorio',
        ];
    }
}
