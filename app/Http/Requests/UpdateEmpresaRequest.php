<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'direccion' => 'sometimes|string|max:150',
            'telefono' => 'sometimes|string|max:20',
            'estado' => 'sometimes|in:Activo,Inactivo',
        ];
    }
}
