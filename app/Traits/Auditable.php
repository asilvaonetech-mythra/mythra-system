<?php

namespace App\Traits;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait Auditable
{
    /**
     * Boot do Trait.
     */
    protected static function bootAuditable(): void
    {

        static::created(function ($model) {

            $model->createAudit(
                'created'
            );

        });



        static::updated(function ($model) {

            $model->createAudit(
                'updated'
            );

        });



        static::deleted(function ($model) {

            $model->createAudit(
                'deleted'
            );

        });



        static::restored(function ($model) {

            $model->createAudit(
                'restored'
            );

        });

    }



    /**
     * Cria registro de auditoria.
     */
    public function createAudit(
        string $event
    ): void {

        $oldValues = null;

        $newValues = null;



        if ($event === 'updated') {

            $oldValues = [];

            $newValues = [];

            foreach ($this->getChanges() as $field => $value) {

                $oldValues[$field] =
                    $this->getOriginal($field);

                $newValues[$field] =
                    $value;

            }

        }



        if ($event === 'created') {

            $newValues =
                $this->getAttributes();

        }



        if ($event === 'deleted') {

            $oldValues =
                $this->getAttributes();

        }



        Audit::create([

            'user_id' => Auth::id(),

            'event' => $event,

            'auditable_type' =>
                get_class($this),

            'auditable_id' =>
                $this->id ?? null,


            'old_values' =>
                $oldValues,


            'new_values' =>
                $newValues,


            'module' =>
                $this->auditModule(),


            'description' =>
                $this->auditDescription($event),


            'ip_address' =>
                Request::ip(),


            'user_agent' =>
                Request::userAgent(),

        ]);

    }



    /**
     * Nome do módulo auditado.
     */
    public function auditModule(): ?string
    {
        return property_exists(
            $this,
            'auditModule'
        )
            ? $this->auditModule
            : null;
    }



    /**
     * Descrição automática.
     */
    public function auditDescription(
        string $event
    ): string {

        return ucfirst($event)
            . ' em '
            . class_basename($this);

    }



    /**
     * Relacionamento.
     */
    public function audits()
    {
        return $this->morphMany(
            Audit::class,
            'auditable'
        );
    }
}