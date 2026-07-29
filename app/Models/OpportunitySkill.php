<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpportunitySkill extends Model
{
    use HasFactory;


    protected $fillable = [
        'opportunity_id',
        'skill_id',
        'nivel_desejado',
    ];


    /**
     * Oportunidade relacionada
     */
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }


    /**
     * Competência desejada
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}