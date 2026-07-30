<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TalentApplication extends Model
{
    use HasFactory;

    protected $table = 'talent_applications';

    protected $fillable = [

        'talent_profile_id',

        'opportunity_id',

        'selection_process_id',

        'status',

        'observacao',

    ];

    /**
     * Talento relacionado à conexão.
     */
    public function talentProfile(): BelongsTo
    {
        return $this->belongsTo(
            TalentProfile::class,
            'talent_profile_id'
        );
    }

    /**
     * Oportunidade relacionada.
     */
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(
            Opportunity::class,
            'opportunity_id'
        );
    }

    /**
     * Processo seletivo relacionado.
     */
    public function selectionProcess(): BelongsTo
    {
        return $this->belongsTo(
            SelectionProcess::class,
            'selection_process_id'
        );
    }
}