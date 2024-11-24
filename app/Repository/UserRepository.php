<?php

namespace App\Repository;

use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    // Additional methods specific to UserRepository...
}
