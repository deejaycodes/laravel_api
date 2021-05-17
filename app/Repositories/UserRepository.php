<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    public function registerUser(array $data)
    {
        try {
            $newUser = new User();
            $newUser->fill($data);
            $newUser->save();
            return $newUser;
        } catch (\Exception $e) {
            return $e->getMessage();

        }
    }
}
