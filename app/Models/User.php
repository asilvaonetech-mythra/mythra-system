<?php

namespace App\Models;

use App\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;


    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'name',
        'email',
        'password',

    ];


    /**
     * Campos ocultos.
     */
    protected $hidden = [

        'password',
        'remember_token',

    ];


    /**
     * Conversões.
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }
}