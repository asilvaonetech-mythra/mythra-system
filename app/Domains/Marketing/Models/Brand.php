<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo_path',
        'colors',
        'typography',
        'guidelines',
        'is_active',
    ];

    protected $casts = [
        'colors' => 'array',
        'typography' => 'array',
        'guidelines' => 'array',
        'is_active' => 'boolean',
    ];
}