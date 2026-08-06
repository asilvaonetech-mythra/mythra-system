<?php

namespace App\Domains\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialNetwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'social_networks';

    protected $fillable = [
        'name',
        'provider',
        'username',
        'profile_url',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'is_active',
        'settings',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'is_active' => 'boolean',
        'settings' => 'array',
    ];

    /**
     * Publicações realizadas nesta rede.
     */
    public function publications(): HasMany
    {
        return $this->hasMany(
            Publication::class,
            'social_network_id'
        );
    }
}