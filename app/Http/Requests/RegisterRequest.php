<?php

namespace App\Http\Requests;

use App\Enum\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use App\Models\Departament;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ['App\Models\User', $this->role_id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:profesors,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'category_id' => ['required', 'int', 'exists:' . Category::class . ',id'],
            'role_id' => ['required', 'int'],
            'departament_id' => ['nullable', 'int', 'exists:' . Departament::class . ',id'],
        ];
    }

    public function after(): array
    {
        return [
            function ($validator) {
                if (
                    in_array($this->role_id, [
                        RoleEnum::JEFE,
                        RoleEnum::JEFE_ASIGNATURE,
                        RoleEnum::PROFESOR
                    ])
                ) {
                    if (is_null($this->departament_id)) {
                        $validator->errors()->add(
                            'departament_id',
                            'Para jefes y profesores tienes que seleccionar el departamento al que pertenecen'
                        );
                    }
                }
            }
        ];
    }

    public function messages(): array
    {
        return [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos',
        ];
    }
}
