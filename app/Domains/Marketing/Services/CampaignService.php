<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Campaign;
use Illuminate\Support\Str;

class CampaignService
{
    public function create(array $data): Campaign
    {
        $data['slug'] = $data['slug']
            ?? Str::slug($data['name']);


        return Campaign::create($data);
    }


    public function update(
        Campaign $campaign,
        array $data
    ): Campaign {

        if (isset($data['name'])) {

            $data['slug'] = Str::slug(
                $data['name']
            );

        }


        $campaign->update($data);


        return $campaign;
    }


    public function delete(
        Campaign $campaign
    ): bool {

        return (bool) $campaign->delete();

    }
}