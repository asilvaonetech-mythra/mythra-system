<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TalentEvolution extends Model
{
    use HasFactory;


    protected $fillable = [
        'talent_profile_id',
        'competencia',
        'nivel_anterior',
        'nivel_atual',
        'observacao',
    ];


    /**
     * Perfil do talento relacionado
     */
    public function talentProfile(): BelongsTo
    {
        return $this->belongsTo(TalentProfile::class);
    }
}