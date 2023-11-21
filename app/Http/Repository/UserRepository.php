<?php

namespace App\Http\Repository;

use App\Models\User;

class UserRepository
{
    public function update($userId, $data)
    {
        $user = User::findOrFail($userId);
        $user->update($data);

        return $user;
    }
}
