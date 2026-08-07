<?php

namespace App\Domains\Marketing\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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


            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],


            'description' => [
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


            'objective' => [
                'nullable',
                'string',
            ],


            'budget' => [
                'nullable',
                'numeric',
            ],


            'starts_at' => [
                'nullable',
                'date',
            ],


            'ends_at' => [
                'nullable',
                'date',
                'after_or_equal:starts_at',
            ],


            'settings' => [
                'nullable',
                'array',
            ],

        ];
    }
}