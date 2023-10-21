<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'eco' => ['required', 'integer'],
            'km' => ['required', 'integer'],
            'persona' => ['required', 'string'],
            'fallas_id' => ['required'],
            'descripcion' => ['string', 'nullable'],
        ];
    }

    public function messages() : array {
        return [
            'eco.required' => 'El número (económico) de vehículo es obligatorio',
            'eco.integer' => 'El número de vehículo debe ser un número entero',
            'km.required' => 'El kilometraje es obligatorio',
            'km.integer' => 'El kilometraje debe ser un número entero',
            'persona' => 'El nombre de quien reporta es obligatorio',
            'fallas_id' => 'La falla presentada es obligatoria',
        ];
    }
}
