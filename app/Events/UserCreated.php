<?php

namespace App\Events;

use App\Models\User;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class UserCreated
{

    use Dispatchable;
    use SerializesModels;



    /**
     * Usuário criado.
     */
    public User $user;



    /**
     * Criar evento.
     */
    public function __construct(
        User $user
    ) {

        $this->user = $user;

    }

}