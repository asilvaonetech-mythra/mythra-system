<?php

namespace App\Traits;

use App\Models\Audit;

use Illuminate\Database\Eloquent\Relations\MorphMany;


trait Auditable
{


    /**
     * Auditorias do modelo.
     */
    public function audits(): MorphMany
    {

        return $this->morphMany(

            Audit::class,

            'model'

        );

    }



    /**
     * Registra auditoria manual.
     */
    public function registerAudit(
        string $action,
        array $oldValues = [],
        array $newValues = []
    ): void {


        Audit::create([


            'user_id' => auth()->id(),


            'module' => $this->auditModule ?? class_basename($this),


            'action' => $action,


            'model' => get_class($this),


            'model_id' => $this->id,


            'old_values' => $oldValues,


            'new_values' => $newValues,


            'ip_address' => request()->ip(),


            'user_agent' => request()->userAgent(),


        ]);


    }



    /**
     * Boot do Trait.
     */
    protected static function bootAuditable(): void
    {


        static::created(function ($model) {


            $model->registerAudit(

                'created',

                [],

                $model->toArray()

            );


        });



        static::updated(function ($model) {


            $model->registerAudit(

                'updated',

                $model->getOriginal(),

                $model->getChanges()

            );


        });



        static::deleted(function ($model) {


            $model->registerAudit(

                'deleted',

                $model->toArray(),

                []

            );


        });


    }


}