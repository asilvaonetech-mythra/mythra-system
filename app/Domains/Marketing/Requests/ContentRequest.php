<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:150',
            ],

            'body' => [
                'nullable',
                'string',
            ],

            'type' => [
                'required',
                'string',
                'max:50',
            ],

            'status' => [
                'nullable',
                'string',
                'max:30',
            ],

            'author' => [
                'nullable',
                'string',
            ],

            'tags' => [
                'nullable',
                'array',
            ],

            'metadata' => [
                'nullable',
                'array',
            ],

            'campaign_id' => [
                'nullable',
                'exists:campaigns,id',
            ],
        ];
    }
}