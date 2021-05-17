<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $user = $this->userService->registerUser($request->all());

        $token = $user->createToken('socialmediaapp')->accessToken;
        dd($token);


        return response()->json([
            'data' => [
                'success' => true,
                'user' => $user,
                'token' => $token,
            ],
        ]);

    }

    public function login(Request $request)
    {
        $newUser = $this->userService->loginUser($request->all());

        if($newUser){
            $token = $newUser->createToken('socialmediaapp');
            return response()->json([

            'token_type' => 'Bearer',
            'expiry_date' => $token->token->expires_at,
            'user' => $newUser,
            'access_token' => $token->accessToken,
        ]);
        }

        return response()->json([

            'err_msg' => 'Login failed',
        ], 401);


    }
    public function me()
    {
        $user = Auth::user();
        return response()->json([
            'user' => $user,
        ]);

    }





}
