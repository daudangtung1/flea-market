<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LoginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(LoginService $login)
    {
        $this->login = $login;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login_data = $request->only(['email', 'password']);
        return $this->login->login($login_data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
