<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Nome da tabela.
     */
    protected $table = 'roles';

    /**
     * Atributos preenchíveis.
     */
    protected $fillable = [
        'name',
        'slug',
        'display_name',
        'description',
        'color',
        'icon',
        'is_system',
        'is_active',
        'created_by',
        'updated_by',
    ];

    /**
     * Casts.
     */
    protected function casts(): array
    {
        return [
            'is_system' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Usuários pertencentes a esta Role.
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'role_user'
        )
        ->withPivot([
            'is_primary',
            'assigned_at',
            'assigned_by',
        ])
        ->withTimestamps();
    }

    /**
     * Permissões desta Role.
     */
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_role'
        )
        ->withPivot([
            'allowed',
            'granted_by',
            'granted_at',
        ])
        ->withTimestamps();
    }

    /**
     * Apenas roles ativas.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Apenas roles do sistema.
     */
    public function scopeSystem($query)
    {
        return $query->where('is_system', true);
    }

    /**
     * Apenas roles personalizadas.
     */
    public function scopeCustom($query)
    {
        return $query->where('is_system', false);
    }

    /**
     * Verifica se possui determinada permissão.
     */
    public function hasPermission(string $permission): bool
    {
        return $this->permissions()
            ->where('slug', $permission)
            ->wherePivot('allowed', true)
            ->exists();
    }

    /**
     * Adiciona uma permissão.
     */
    public function givePermission($permission): void
    {
        if ($permission instanceof Permission) {
            $permissionId = $permission->id;
        } else {
            $permissionId = Permission::where('slug', $permission)->value('id');
        }

        if (!$permissionId) {
            return;
        }

        $this->permissions()->syncWithoutDetaching([
            $permissionId => [
                'allowed' => true,
                'granted_at' => now(),
            ],
        ]);
    }

    /**
     * Remove uma permissão.
     */
    public function revokePermission($permission): void
    {
        if ($permission instanceof Permission) {
            $permissionId = $permission->id;
        } else {
            $permissionId = Permission::where('slug', $permission)->value('id');
        }

        if (!$permissionId) {
            return;
        }

        $this->permissions()->detach($permissionId);
    }
}