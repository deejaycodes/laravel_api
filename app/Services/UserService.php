<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserService
{

    protected $userRepositoryInterface;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function registerUser(array $data)
    {

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $newUser = $this->userRepositoryInterface->registerUser($userData);

        return $newUser;
    }

    public function loginUser(array $data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

            $user = Auth::user();
            return $user;

        }

        return false;


    }

}
