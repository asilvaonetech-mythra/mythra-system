<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Automation;
use Illuminate\Database\Eloquent\Collection;

class AutomationService
{
    /**
     * Lista automações.
     */
    public function all(): Collection
    {
        return Automation::query()
            ->latest()
            ->get();
    }

    /**
     * Cria automação.
     */
    public function create(array $data): Automation
    {
        return Automation::create($data);
    }

    /**
     * Atualiza automação.
     */
    public function update(
        Automation $automation,
        array $data
    ): Automation {
        $automation->update($data);

        return $automation->refresh();
    }

    /**
     * Executa automação.
     */
    public function execute(
        Automation $automation
    ): Automation {
        $automation->update([
            'last_execution_at' => now(),
        ]);

        return $automation->refresh();
    }

    /**
     * Ativa ou desativa automação.
     */
    public function toggle(
        Automation $automation
    ): Automation {
        $automation->update([
            'is_active' => ! $automation->is_active,
        ]);

        return $automation->refresh();
    }
}