<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';

    protected $fillable = [

        'talent_profile_id',

        'titulo',

        'resumo',

        'experiencias_texto',

        'formacao_texto',

        'certificacoes_texto',

        'projetos_texto',

        'principal',

    ];

    protected $casts = [

        'principal' => 'boolean',

    ];

    /**
     * Perfil do talento relacionado.
     */
    public function talentProfile(): BelongsTo
    {
        return $this->belongsTo(
            TalentProfile::class,
            'talent_profile_id'
        );
    }
}