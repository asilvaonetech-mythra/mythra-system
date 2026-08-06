<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Automation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'automations';

    protected $fillable = [
        'name',
        'description',
        'trigger',
        'action',
        'status',
        'is_active',
        'conditions',
        'configuration',
        'last_execution_at',
        'next_execution_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'conditions' => 'array',
        'configuration' => 'array',
        'last_execution_at' => 'datetime',
        'next_execution_at' => 'datetime',
    ];
}