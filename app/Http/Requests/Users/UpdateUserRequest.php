<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'  => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'required|min:6',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'El nombre debe tener al menos 2 caracteres',
            'password.required' => 'Este campo es requerido' ,
            'password.min' => 'La contraseña debe tener al menos 6 caracteres' ,
            'email.required' => 'Este campo es requerido',
            'email.email'   => 'El correo electrónico ingresado es inválido',
            'email.unique'  => 'Este correo ya existe',
            'role_id'         => 'Este campo es requerido',
        ];
    }
}
