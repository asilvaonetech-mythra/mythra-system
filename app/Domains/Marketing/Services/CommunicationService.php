<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Communication;
use Illuminate\Database\Eloquent\Collection;

class CommunicationService
{
    /**
     * Lista comunicações.
     */
    public function all(): Collection
    {
        return Communication::query()
            ->with('campaign')
            ->latest()
            ->get();
    }

    /**
     * Cria comunicação.
     */
    public function create(array $data): Communication
    {
        return Communication::create($data);
    }

    /**
     * Atualiza comunicação.
     */
    public function update(
        Communication $communication,
        array $data
    ): Communication {
        $communication->update($data);

        return $communication->refresh();
    }

    /**
     * Marca como enviada.
     */
    public function send(
        Communication $communication
    ): Communication {
        $communication->update([
            'status' => 'sent',
            'sent_at' => now(),
        ]);

        return $communication->refresh();
    }

    /**
     * Remove comunicação.
     */
    public function delete(
        Communication $communication
    ): bool {
        return (bool) $communication->delete();
    }
}