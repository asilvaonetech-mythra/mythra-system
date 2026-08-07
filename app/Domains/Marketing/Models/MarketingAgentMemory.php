<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketingAgentMemory extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'marketing_agent_memories';


    protected $fillable = [

        'agent',

        'domain',

        'type',

        'title',

        'content',

        'metadata',

    ];


    protected $casts = [

        'metadata' => 'array',

    ];
}