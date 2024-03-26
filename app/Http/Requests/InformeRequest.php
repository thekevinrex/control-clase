<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformeRequest extends FormRequest
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
            'to_user_id' => 'integer|required|exists:App\Models\User,id',
            'asignature_id' => 'required|integer|exists:App\Models\Asignature,id',

            'titulo' => 'required|string',
            'grupo' => 'required|string',
            'tipo_clase' => 'required|string',

            'logros' => 'string',
            'recomendaciones' => 'string',
            'deficiencias' => 'string',
            'evaluation' => 'required|integer',
        ];
    }
}
