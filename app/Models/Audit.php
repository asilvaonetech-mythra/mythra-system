<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Audit extends Model
{
    use SoftDeletes;



    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'user_id',

        'event',

        'auditable_type',

        'auditable_id',

        'old_values',

        'new_values',

        'module',

        'description',

        'ip_address',

        'user_agent',

    ];



    /**
     * Conversões.
     */
    protected $casts = [

        'old_values' => 'array',

        'new_values' => 'array',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */


    /**
     * Usuário responsável pela ação.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class
        );
    }



    /**
     * Registro auditado.
     */
    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }



    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */


    public function scopeEvent(
        $query,
        string $event
    ) {

        return $query->where(
            'event',
            $event
        );

    }



    public function scopeModule(
        $query,
        string $module
    ) {

        return $query->where(
            'module',
            $module
        );

    }



    public function scopeUser(
        $query,
        int $userId
    ) {

        return $query->where(
            'user_id',
            $userId
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */


    public function hasAuditChanges(): bool
    {
        return !empty($this->old_values)
            || !empty($this->new_values);
    }



    public function getActionLabel(): string
    {
        return match ($this->event) {

            'created' => 'Criado',

            'updated' => 'Atualizado',

            'deleted' => 'Excluído',

            'restored' => 'Restaurado',

            default => ucfirst($this->event),

        };
    }
}