<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TalentApplication extends Model
{
    use HasFactory;


    protected $fillable = [
        'talent_profile_id',
        'opportunity_id',
        'selection_process_id',
        'status',
        'observacao',
    ];


    /**
     * Talento relacionado à conexão
     */
    public function talentProfile(): BelongsTo
    {
        return $this->belongsTo(TalentProfile::class);
    }


    /**
     * Oportunidade relacionada
     */
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }


    /**
     * Processo seletivo relacionado
     */
    public function selectionProcess(): BelongsTo
    {
        return $this->belongsTo(SelectionProcess::class);
    }
}