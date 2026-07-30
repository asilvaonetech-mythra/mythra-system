<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [

        'nome',

        'categoria',

        'descricao',

        'status',

    ];

    /**
     * Competências dos talentos.
     */
    public function talentSkills()
    {
        return $this->hasMany(
            TalentSkill::class,
            'skill_id'
        );
    }

    /**
     * Competências das oportunidades.
     */
    public function opportunitySkills()
    {
        return $this->hasMany(
            OpportunitySkill::class,
            'skill_id'
        );
    }
}