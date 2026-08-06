<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialNetworkRequest extends FormRequest
{
    /**
     * Permissão da requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'provider' => [
                'required',
                'string',
                'max:100',
            ],

            'username' => [
                'nullable',
                'string',
            ],

            'profile_url' => [
                'nullable',
                'url',
            ],

            'access_token' => [
                'nullable',
                'string',
            ],

            'refresh_token' => [
                'nullable',
                'string',
            ],

            'token_expires_at' => [
                'nullable',
                'date',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            'settings' => [
                'nullable',
                'array',
            ],
        ];
    }
}