<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
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
        $this->login->login($request);
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
