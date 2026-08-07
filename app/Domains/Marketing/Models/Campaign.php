<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'campaigns';


    protected $fillable = [

        'name',

        'slug',

        'description',

        'type',

        'status',

        'objective',

        'budget',

        'starts_at',

        'ends_at',

        'settings',

    ];


    protected $casts = [

        'budget' => 'decimal:2',

        'starts_at' => 'datetime',

        'ends_at' => 'datetime',

        'settings' => 'array',

    ];


    public function publications(): HasMany
    {
        return $this->hasMany(
            Publication::class,
            'campaign_id'
        );
    }


    public function contents(): HasMany
    {
        return $this->hasMany(
            Content::class,
            'campaign_id'
        );
    }


    public function editorialCalendars(): HasMany
    {
        return $this->hasMany(
            EditorialCalendar::class,
            'campaign_id'
        );
    }


    public function communications(): HasMany
    {
        return $this->hasMany(
            Communication::class,
            'campaign_id'
        );
    }


    public function metrics(): HasMany
    {
        return $this->hasMany(
            Metric::class,
            'campaign_id'
        );
    }
}