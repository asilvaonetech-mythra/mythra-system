<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'status',
    ];


    /**
     * Talentos que possuem esta competência
     */
    public function talentSkills(): HasMany
    {
        return $this->hasMany(TalentSkill::class);
    }


    /**
     * Oportunidades que possuem esta competência desejada
     */
    public function opportunitySkills(): HasMany
    {
        return $this->hasMany(OpportunitySkill::class);
    }
}