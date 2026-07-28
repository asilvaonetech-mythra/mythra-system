<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Autorização.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Regras.
     */
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',

                Rule::unique('users', 'email')
                    ->ignore($this->route('user')),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'roles' => [
                'nullable',
                'array',
            ],

            'roles.*' => [
                'exists:roles,slug',
            ],

        ];
    }

    /**
     * Mensagens.
     */
    public function messages(): array
    {
        return [

            'name.required' => 'Informe o nome.',

            'email.required' => 'Informe o e-mail.',

            'email.email' => 'E-mail inválido.',

            'email.unique' => 'Este e-mail já pertence a outro usuário.',

            'password.min' => 'A senha deve possuir no mínimo 8 caracteres.',

            'password.confirmed' => 'A confirmação da senha não confere.',

            'roles.array' => 'Formato inválido para as roles.',

            'roles.*.exists' => 'Uma das roles selecionadas é inválida.',

        ];
    }
}