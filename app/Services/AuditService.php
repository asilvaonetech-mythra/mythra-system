<?php

namespace App\Services;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditService
{
    /**
     * Registrar auditoria manual.
     */
    public function create(
        string $event,
        string $type,
        ?int $id = null,
        ?array $oldValues = null,
        ?array $newValues = null,
        ?string $module = null,
        ?string $description = null
    ): Audit {


        return Audit::create([

            'user_id' => Auth::id(),

            'event' => $event,

            'auditable_type' => $type,

            'auditable_id' => $id,

            'old_values' => $oldValues,

            'new_values' => $newValues,

            'module' => $module,

            'description' => $description,

            'ip_address' => Request::ip(),

            'user_agent' => Request::userAgent(),

        ]);

    }



    /**
     * Registrar criação.
     */
    public function created(
        string $type,
        int $id,
        array $values = [],
        ?string $module = null
    ): Audit {

        return $this->create(

            'created',

            $type,

            $id,

            null,

            $values,

            $module,

            'Registro criado'

        );

    }



    /**
     * Registrar alteração.
     */
    public function updated(
        string $type,
        int $id,
        array $oldValues = [],
        array $newValues = [],
        ?string $module = null
    ): Audit {

        return $this->create(

            'updated',

            $type,

            $id,

            $oldValues,

            $newValues,

            $module,

            'Registro atualizado'

        );

    }



    /**
     * Registrar exclusão.
     */
    public function deleted(
        string $type,
        int $id,
        array $values = [],
        ?string $module = null
    ): Audit {

        return $this->create(

            'deleted',

            $type,

            $id,

            $values,

            null,

            $module,

            'Registro excluído'

        );

    }



    /**
     * Consultar histórico.
     */
    public function history(
        string $type,
        int $id
    ) {

        return Audit::where(
                'auditable_type',
                $type
            )
            ->where(
                'auditable_id',
                $id
            )
            ->latest()
            ->get();

    }



    /**
     * Auditorias recentes.
     */
    public function latest(
        int $limit = 50
    ) {

        return Audit::latest()
            ->limit($limit)
            ->get();

    }



    /**
     * Limpar registros antigos.
     */
    public function purge(
        int $days = 365
    ): int {

        return Audit::where(
                'created_at',
                '<',
                now()->subDays($days)
            )
            ->delete();

    }
}