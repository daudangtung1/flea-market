<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;

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
        $this->login->login($request);
    }

    public function logout()
    {
    }
}
