<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'trigger' => [
                'required',
                'string',
                'max:100',
            ],

            'action' => [
                'required',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'string',
                'max:30',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            'conditions' => [
                'nullable',
                'array',
            ],

            'configuration' => [
                'nullable',
                'array',
            ],

            'last_execution_at' => [
                'nullable',
                'date',
            ],

            'next_execution_at' => [
                'nullable',
                'date',
            ],
        ];
    }
}