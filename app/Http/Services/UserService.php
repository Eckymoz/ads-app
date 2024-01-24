<?php

namespace App\Http\Services;

use App\Http\Repository\AdRepository;
use App\Http\Repository\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateProfile($user, $data)
    {
        $updatedUser = $this->userRepository->update($user->id, $data);

        return $updatedUser;
    }
}
