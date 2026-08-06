<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Communication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'communications';

    protected $fillable = [
        'title',
        'message',
        'type',
        'channel',
        'status',
        'scheduled_at',
        'sent_at',
        'recipients',
        'metadata',
        'campaign_id',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
        'recipients' => 'array',
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
}