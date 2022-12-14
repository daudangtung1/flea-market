<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login($login_data)
    {
        if (!Auth::attempt(['email' => $login_data['email'], 'password' => $login_data['password']])) {
            return redirect()->back();
        }
        return redirect()->route('index');
    }
}
