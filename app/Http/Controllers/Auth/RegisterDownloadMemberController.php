<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use App\Services\LoginService;

class RegisterDownloadMemberController extends Controller
{
    public function __construct(RegisterService $register, LoginService $login)
    {
        $this->register = $register;
        $this->login = $login;
    }
    public function index()
    {
        return view('auth.register-download-member');
    }

    public function store(Request $request)
    {
        $auth = $this->register->registerDownloadMember($request);
        return $this->login->login($auth);
    }
}
