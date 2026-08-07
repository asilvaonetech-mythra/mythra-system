<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\MarketingAgentMemory;

class MarketingAgentMemoryService
{
    public function remember(
        string $agent,
        string $type,
        string $title,
        string $content,
        array $metadata = []
    ): MarketingAgentMemory {

        return MarketingAgentMemory::create([

            'agent' => $agent,

            'domain' => 'Marketing',

            'type' => $type,

            'title' => $title,

            'content' => $content,

            'metadata' => $metadata,

        ]);
    }


    public function history(
        string $agent
    ) {

        return MarketingAgentMemory::where('agent', $agent)
            ->latest()
            ->get();
    }
}