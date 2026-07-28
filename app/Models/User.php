<?php

namespace App\Models;

use App\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'avatar',
        'is_active',
        'last_login_at',

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
            'last_login_at'      => 'datetime',

            'password'           => 'hashed',

            'is_active'          => 'boolean',

        ];
    }

    /**
     * Scope ativos.
     */
    public function scopeActive($query)
    {
        return $query->where(
            'is_active',
            true
        );
    }

    /**
     * Scope inativos.
     */
    public function scopeInactive($query)
    {
        return $query->where(
            'is_active',
            false
        );
    }

    /**
     * Ativa usuário.
     */
    public function activate(): void
    {
        $this->update([
            'is_active' => true
        ]);
    }

    /**
     * Desativa usuário.
     */
    public function deactivate(): void
    {
        $this->update([
            'is_active' => false
        ]);
    }

    /**
     * Atualiza último login.
     */
    public function updateLastLogin(): void
    {
        $this->update([
            'last_login_at' => now()
        ]);
    }
}