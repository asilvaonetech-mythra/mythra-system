<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Nome da tabela.
     */
    protected $table = 'permissions';

    /**
     * Campos preenchíveis.
     */
    protected $fillable = [
        'name',
        'slug',
        'module',
        'display_name',
        'description',
        'is_system',
        'is_active',
        'created_by',
        'updated_by',
    ];

    /**
     * Conversões.
     */
    protected function casts(): array
    {
        return [
            'is_system' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Roles vinculadas.
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
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
     * Scope: permissões ativas.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: permissões do sistema.
     */
    public function scopeSystem($query)
    {
        return $query->where('is_system', true);
    }

    /**
     * Scope: permissões customizadas.
     */
    public function scopeCustom($query)
    {
        return $query->where('is_system', false);
    }

    /**
     * Scope por módulo.
     */
    public function scopeModule($query, string $module)
    {
        return $query->where('module', $module);
    }

    /**
     * Verifica se pertence a uma Role.
     */
    public function belongsToRole(string $role): bool
    {
        return $this->roles()
            ->where('slug', $role)
            ->exists();
    }

    /**
     * Vincula uma Role.
     */
    public function assignRole($role): void
    {
        if ($role instanceof Role) {
            $roleId = $role->id;
        } else {
            $roleId = Role::where('slug', $role)->value('id');
        }

        if (!$roleId) {
            return;
        }

        $this->roles()->syncWithoutDetaching([
            $roleId => [
                'allowed' => true,
                'granted_at' => now(),
            ],
        ]);
    }

    /**
     * Remove uma Role.
     */
    public function removeRole($role): void
    {
        if ($role instanceof Role) {
            $roleId = $role->id;
        } else {
            $roleId = Role::where('slug', $role)->value('id');
        }

        if (!$roleId) {
            return;
        }

        $this->roles()->detach($roleId);
    }
}