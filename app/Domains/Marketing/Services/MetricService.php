<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Metric;
use Illuminate\Database\Eloquent\Collection;

class MetricService
{
    /**
     * Lista métricas.
     */
    public function all(): Collection
    {
        return Metric::query()
            ->with([
                'campaign',
                'publication',
            ])
            ->latest()
            ->get();
    }

    /**
     * Registra métrica.
     */
    public function create(array $data): Metric
    {
        return Metric::create($data);
    }

    /**
     * Atualiza métrica.
     */
    public function update(
        Metric $metric,
        array $data
    ): Metric {
        $metric->update($data);

        return $metric->refresh();
    }

    /**
     * Soma valores por tipo.
     */
    public function totalByType(
        string $type
    ): float {
        return (float) Metric::query()
            ->where('type', $type)
            ->sum('value');
    }

    /**
     * Remove métrica.
     */
    public function delete(
        Metric $metric
    ): bool {
        return (bool) $metric->delete();
    }
}