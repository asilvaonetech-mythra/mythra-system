<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Agents\ElaraAgent;


class MarketingIntelligenceService
{

    public function __construct(
        protected ElaraAgent $elara
    ) {
    }



    public function generateEditorialPlan(): array
    {
        return [
            'agent' => $this->elara->identity(),

            'plan' => [
                'posts' => 12,
                'videos' => 4,
                'stories' => 20,
            ],
        ];
    }



    public function campaignSuggestion(
        array $context = []
    ): array {

        return $this->elara->analyze(
            $context
        );
    }



    public function contentIdeas(): array
    {
        return $this->elara->suggestContent();
    }

}