<?php

namespace App\Observers;

use App\Models\Audit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditObserver
{

    /**
     * Evento criado.
     */
    public function created(Model $model): void
    {
        $this->audit(
            $model,
            'created'
        );
    }



    /**
     * Evento atualizado.
     */
    public function updated(Model $model): void
    {
        $this->audit(
            $model,
            'updated'
        );
    }



    /**
     * Evento excluído.
     */
    public function deleted(Model $model): void
    {
        $this->audit(
            $model,
            'deleted'
        );
    }



    /**
     * Evento restaurado.
     */
    public function restored(Model $model): void
    {
        $this->audit(
            $model,
            'restored'
        );
    }



    /**
     * Criar registro de auditoria.
     */
    protected function audit(
        Model $model,
        string $event
    ): void {


        /*
        |--------------------------------------------------------------------------
        | Não auditar a própria tabela de auditoria
        |--------------------------------------------------------------------------
        */

        if ($model instanceof Audit) {

            return;

        }



        $oldValues = null;

        $newValues = null;



        if ($event === 'updated') {

            $oldValues = [];

            $newValues = [];

            foreach ($model->getChanges() as $field => $value) {

                $oldValues[$field] =
                    $model->getOriginal($field);


                $newValues[$field] =
                    $value;

            }

        }



        if ($event === 'created') {

            $newValues =
                $model->getAttributes();

        }



        if ($event === 'deleted') {

            $oldValues =
                $model->getAttributes();

        }



        Audit::create([

            'user_id' => Auth::id(),

            'event' => $event,

            'auditable_type' =>
                get_class($model),

            'auditable_id' =>
                $model->getKey(),


            'old_values' =>
                $oldValues,


            'new_values' =>
                $newValues,


            'module' =>
                class_basename($model),


            'description' =>
                ucfirst($event)
                . ' '
                . class_basename($model),


            'ip_address' =>
                Request::ip(),


            'user_agent' =>
                Request::userAgent(),

        ]);

    }

}