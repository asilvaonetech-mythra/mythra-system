<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opportunity extends Model
{
    use HasFactory;


    protected $fillable = [
        'organization_id',
        'titulo',
        'descricao',
        'modelo_trabalho',
        'localizacao',
        'nivel',
        'status',
    ];


    /**
     * Organização responsável pela oportunidade
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }


    /**
     * Competências desejadas
     */
    public function opportunitySkills(): HasMany
    {
        return $this->hasMany(OpportunitySkill::class);
    }


    /**
     * Processos seletivos vinculados
     */
    public function selectionProcesses(): HasMany
    {
        return $this->hasMany(SelectionProcess::class);
    }


    /**
     * Conexões com talentos
     */
    public function applications(): HasMany
    {
        return $this->hasMany(TalentApplication::class);
    }
}