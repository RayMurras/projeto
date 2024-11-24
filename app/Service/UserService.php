<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService extends AbstractService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

     /**
     * Validation rules for creating a user.
     */
    protected function getCreateValidationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }

    protected function getUpdateValidationRules(): array
    {
        return [
            'name' => 'sometimes|string|max:255|min:3', // 'nullable' means this field is optional
            'email' => 'sometimes|email|unique:users,email', // Ignore uniqueness check for the current user's email
            'password' => 'sometimes|min:8', // Only validate if the password is provided
        ];
    }

}
