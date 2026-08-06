<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Automation;

class AutomationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.automations.view');
    }

    public function view(
        User $user,
        Automation $automation
    ): bool {
        return $user->can('marketing.automations.view');
    }

    public function create(User $user): bool
    {
        return $user->can('marketing.automations.create');
    }

    public function update(
        User $user,
        Automation $automation
    ): bool {
        return $user->can('marketing.automations.update');
    }

    public function execute(
        User $user,
        Automation $automation
    ): bool {
        return $user->can('marketing.automations.execute');
    }

    public function delete(
        User $user,
        Automation $automation
    ): bool {
        return $user->can('marketing.automations.delete');
    }
}