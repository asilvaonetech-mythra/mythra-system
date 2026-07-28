<?php

namespace App\Models;

use App\Traits\Auditable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Permission extends Model
{

    use HasFactory;
    use SoftDeletes;
    use Auditable;



    /**
     * Tabela.
     */
    protected $table = 'permissions';



    /**
     * Módulo auditoria.
     */
    protected string $auditModule = 'rbac';



    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'name',

        'slug',

        'description',

        'module',

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
     * Apenas permissões ativas.
     */
    public function scopeActive($query)
    {
        return $query->where(

            'is_active',

            true

        );
    }



    /**
     * Verifica se está liberada para uma role.
     */
    public function isAllowedFor(Role $role): bool
    {

        return $this->roles()

            ->where(

                'roles.id',

                $role->id

            )

            ->wherePivot(

                'allowed',

                true

            )

            ->exists();

    }


}