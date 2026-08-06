<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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

            'file_path' => [
                'required',
                'string',
            ],

            'file_name' => [
                'nullable',
                'string',
            ],

            'mime_type' => [
                'nullable',
                'string',
            ],

            'file_size' => [
                'nullable',
                'integer',
            ],

            'duration' => [
                'nullable',
                'integer',
            ],

            'resolution' => [
                'nullable',
                'string',
            ],

            'category' => [
                'nullable',
                'string',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'metadata' => [
                'nullable',
                'array',
            ],

            'content_id' => [
                'nullable',
                'exists:contents,id',
            ],
        ];
    }
}