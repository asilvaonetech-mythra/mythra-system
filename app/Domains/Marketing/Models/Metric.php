<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Metric extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'metrics';

    protected $fillable = [
        'name',
        'type',
        'value',
        'source',
        'measured_at',
        'campaign_id',
        'publication_id',
        'metadata',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'measured_at' => 'date',
        'metadata' => 'array',
    ];

    /**
     * Campanha relacionada.
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(
            Campaign::class,
            'campaign_id'
        );
    }

    /**
     * Publicação relacionada.
     */
    public function publication(): BelongsTo
    {
        return $this->belongsTo(
            Publication::class,
            'publication_id'
        );
    }
}