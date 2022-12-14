<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use App\Services\LoginService;

class RegisterAffiliateMemberController extends Controller
{
    public function __construct(RegisterService $register, LoginService $login)
    {
        $this->register = $register;
        $this->login = $login;
    }

    public function index()
    {
        return view('auth.register-affiliate-member');
    }

    public function store(Request $request)
    {
        $auth = $this->register->registerAffiliateMember($request);
        return $this->login->login($auth);
    }
}
