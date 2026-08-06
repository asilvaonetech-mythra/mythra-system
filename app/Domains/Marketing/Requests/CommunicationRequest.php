<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunicationRequest extends FormRequest
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

            'message' => [
                'required',
                'string',
            ],

            'type' => [
                'required',
                'string',
                'max:50',
            ],

            'channel' => [
                'required',
                'string',
                'max:50',
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

            'sent_at' => [
                'nullable',
                'date',
            ],

            'recipients' => [
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