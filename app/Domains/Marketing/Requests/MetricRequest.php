<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetricRequest extends FormRequest
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

            'type' => [
                'required',
                'string',
                'max:50',
            ],

            'value' => [
                'required',
                'numeric',
            ],

            'source' => [
                'nullable',
                'string',
            ],

            'measured_at' => [
                'required',
                'date',
            ],

            'campaign_id' => [
                'nullable',
                'exists:campaigns,id',
            ],

            'publication_id' => [
                'nullable',
                'exists:publications,id',
            ],

            'metadata' => [
                'nullable',
                'array',
            ],
        ];
    }
}