<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TalentProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'nome_completo',
        'data_nascimento',
        'telefone',
        'localizacao',
        'resumo_profissional',
        'objetivo_profissional',
        'disponibilidade',
        'status',
    ];


    protected $casts = [
        'data_nascimento' => 'date',
    ];


    /**
     * Usuário vinculado ao perfil do talento
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Currículos do talento
     */
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
    }


    /**
     * Competências do talento
     */
    public function talentSkills(): HasMany
    {
        return $this->hasMany(TalentSkill::class);
    }


    /**
     * Candidaturas realizadas
     */
    public function applications(): HasMany
    {
        return $this->hasMany(TalentApplication::class);
    }


    /**
     * Histórico de evolução
     */
    public function evolutions(): HasMany
    {
        return $this->hasMany(TalentEvolution::class);
    }
}