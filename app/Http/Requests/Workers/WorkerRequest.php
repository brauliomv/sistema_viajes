<?php

namespace App\Http\Requests\Workers;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'dni'  => 'required|numeric|digits:13|unique:workers,dni',
            'phone' => 'required',
         ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'El nombre debe tener al menos 2 caracteres',
            'dni.required'  => 'El campo es requerido',
            'dni.digits'  => 'El campo debe contener solamente 13 valores numéricos',
            'dni.min' => 'El campo debe contener al menos 13 dígitos',
            'dni.max' => 'El campo debe contener un máximo de 13 dígitos',
            'dni.unique' => 'Este número de identificación ya existe',
            'phone.required' => 'Este campo es requerido',
        ];

    }
}
