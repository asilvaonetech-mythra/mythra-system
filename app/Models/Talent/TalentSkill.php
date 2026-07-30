<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TalentSkill extends Model
{
    use HasFactory;

    protected $table = 'talent_skills';

    protected $fillable = [

        'talent_profile_id',

        'skill_id',

        'nivel',

        'anos_experiencia',

    ];

    /**
     * Perfil do talento.
     */
    public function talentProfile(): BelongsTo
    {
        return $this->belongsTo(
            TalentProfile::class,
            'talent_profile_id'
        );
    }

    /**
     * Competência relacionada.
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(
            Skill::class,
            'skill_id'
        );
    }
}