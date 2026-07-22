<?php

namespace App\Core\Kernel;

class MythraKernel
{
    /**
     * Nome oficial do núcleo.
     */
    protected string $name = 'Mythra Core';

    /**
     * Retorna a identificação do núcleo.
     */
    public function identity(): string
    {
        return $this->name;
    }
}