<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado
     * a realizar esta requisição.
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
                'max:150',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'logo_path' => [
                'nullable',
                'string',
            ],

            'colors' => [
                'nullable',
                'array',
            ],

            'typography' => [
                'nullable',
                'array',
            ],

            'guidelines' => [
                'nullable',
                'array',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}