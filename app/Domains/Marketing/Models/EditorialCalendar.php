<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EditorialCalendar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'editorial_calendars';

    protected $fillable = [
        'title',
        'description',
        'content_type',
        'status',
        'scheduled_date',
        'scheduled_time',
        'campaign_id',
        'channels',
        'metadata',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
        'scheduled_time' => 'datetime',
        'channels' => 'array',
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