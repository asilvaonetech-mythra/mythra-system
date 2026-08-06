<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
            'campaign_id' => [
                'nullable',
                'exists:campaigns,id',
            ],

            'social_network_id' => [
                'nullable',
                'exists:social_networks,id',
            ],

            'title' => [
                'required',
                'string',
                'max:150',
            ],

            'content' => [
                'required',
                'string',
            ],

            'status' => [
                'nullable',
                'string',
                'max:30',
            ],

            'scheduled_at' => [
                'nullable',
                'date',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            'metadata' => [
                'nullable',
                'array',
            ],
        ];
    }
}