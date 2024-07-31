<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'start-date' => 'required',
            'end-date'   => 'required',
            'driver'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'start-date.required' => 'La fecha de inicio es requerida',
            'end-date.required' => 'La fecha final es requerida',
            'driver.required'   => 'Debes seleccionar un conductor',
        ];
    }
}
