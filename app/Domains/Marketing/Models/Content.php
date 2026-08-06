<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contents';

    protected $fillable = [
        'title',
        'body',
        'type',
        'status',
        'author',
        'tags',
        'metadata',
        'campaign_id',
    ];

    protected $casts = [
        'tags' => 'array',
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
     * Imagens relacionadas ao conteúdo.
     */
    public function images(): HasMany
    {
        return $this->hasMany(
            ImageAsset::class,
            'content_id'
        );
    }

    /**
     * Vídeos relacionados ao conteúdo.
     */
    public function videos(): HasMany
    {
        return $this->hasMany(
            VideoAsset::class,
            'content_id'
        );
    }

    /**
     * Áudios relacionados ao conteúdo.
     */
    public function audios(): HasMany
    {
        return $this->hasMany(
            AudioAsset::class,
            'content_id'
        );
    }
}