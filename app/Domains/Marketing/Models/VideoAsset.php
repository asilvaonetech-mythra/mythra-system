<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'video_assets';

    protected $fillable = [
        'name',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'duration',
        'resolution',
        'category',
        'description',
        'metadata',
        'content_id',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'duration' => 'integer',
        'metadata' => 'array',
    ];

    /**
     * Conteúdo relacionado.
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(
            Content::class,
            'content_id'
        );
    }
}