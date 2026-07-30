<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpportunitySkill extends Model
{
    use HasFactory;

    protected $table = 'opportunity_skills';

    protected $fillable = [

        'opportunity_id',

        'skill_id',

        'nivel_desejado',

    ];

    /**
     * Oportunidade relacionada.
     */
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(
            Opportunity::class,
            'opportunity_id'
        );
    }

    /**
     * Competência desejada.
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(
            Skill::class,
            'skill_id'
        );
    }
}