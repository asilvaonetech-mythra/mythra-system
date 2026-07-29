<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SelectionProcess extends Model
{
    use HasFactory;


    protected $fillable = [
        'opportunity_id',
        'nome',
        'descricao',
        'status',
    ];


    /**
     * Oportunidade vinculada ao processo
     */
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }


    /**
     * Talentos participantes do processo
     */
    public function applications(): HasMany
    {
        return $this->hasMany(TalentApplication::class);
    }
}