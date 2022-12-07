<?php

namespace App\Services\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login($request)
    {
        $login_data = $request->only(['email', 'password']);
        if (Auth::attempt(['email' => $login_data['email'], 'password' => $login_data['password']])) {
            dd(1);
        } else dd(2);
    }
}
