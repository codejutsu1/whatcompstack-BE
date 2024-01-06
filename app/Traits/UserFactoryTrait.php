<?php

namespace App\Traits;

use App\Models\User;

trait UserFactoryTrait {

    protected function createUser($role = null): User
    {
        return User::factory()->create(['role' => $role]);    
    }
}