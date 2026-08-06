<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publications';

    protected $fillable = [
        'campaign_id',
        'social_network_id',
        'title',
        'content',
        'status',
        'scheduled_at',
        'published_at',
        'metadata',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'published_at' => 'datetime',
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
     * Rede social relacionada.
     */
    public function socialNetwork(): BelongsTo
    {
        return $this->belongsTo(
            SocialNetwork::class,
            'social_network_id'
        );
    }

    /**
     * Métricas da publicação.
     */
    public function metrics(): HasMany
    {
        return $this->hasMany(
            Metric::class,
            'publication_id'
        );
    }
}