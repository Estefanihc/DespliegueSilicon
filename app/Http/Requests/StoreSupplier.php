<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplier extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validación de datos
            'company_name' => 'required|string|max:255',
            'fiscal_address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'credit_line' => 'nullable|numeric'
        ];
    }

    // Método para personalización de mensajes de validación
    public function messages(): array
    {
        return [
            'company_name.required' => 'El nombre de la empresa es obligatorio.',
            'company_name.string' => 'El nombre de la empresa debe ser un texto válido.',
            'company_name.max' => 'El nombre de la empresa no debe exceder 255 caracteres.',

            'fiscal_address.required' => 'La dirección fiscal es obligatoria.',
            'fiscal_address.string' => 'La dirección fiscal debe ser un texto válido.',
            'fiscal_address.max' => 'La dirección fiscal no debe exceder 255 caracteres.',

            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no debe exceder 255 caracteres.',

            'phone.string' => 'El teléfono debe ser un texto válido.',
            'phone.max' => 'El teléfono no debe exceder 20 caracteres.',

            'credit_line.numeric' => 'La línea de crédito debe ser un valor numérico.',
        ];
    }

    // Método para personalizar el nombre de los atributos
    public function attributes(): array
    {
        return [
            'company_name' => 'nombre de la empresa',
            'fiscal_address' => 'dirección fiscal',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'credit_line' => 'línea de crédito',
        ];
    }
}
