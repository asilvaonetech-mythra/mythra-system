<?php

namespace App\Listeners;

use App\Events\UserCreated;

use Illuminate\Support\Facades\Cache;


class ClearPermissionCache
{


    /**
     * Executa listener.
     */
    public function handle(
        UserCreated $event
    ): void
    {


        $user = $event->user;



        Cache::forget(

            "user_permissions_{$user->id}"

        );


    }

}