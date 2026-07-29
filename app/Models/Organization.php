<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'documento',
        'segmento',
        'descricao',
        'localizacao',
        'responsavel_user_id',
        'status',
    ];


    /**
     * Usuário responsável pela organização
     */
    public function responsibleUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsavel_user_id');
    }


    /**
     * Oportunidades da organização
     */
    public function opportunities(): HasMany
    {
        return $this->hasMany(Opportunity::class);
    }
}