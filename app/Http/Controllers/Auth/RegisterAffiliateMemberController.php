<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\RegisterService;

class RegisterAffiliateMemberController extends Controller
{
    public function __construct(RegisterService $register)
    {
        $this->register = $register;
    }

    public function index()
    {
        return view('auth.register-affiliate-member');
    }

    public function store(Request $request)
    {
        $auth = $this->register->registerAffiliateMember($request);
        dd($auth);
    }
}
