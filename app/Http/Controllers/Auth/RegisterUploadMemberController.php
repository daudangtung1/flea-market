<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\RegisterService;

class RegisterUploadMemberController extends Controller
{
    public function __construct(RegisterService $register)
    {
        $this->register = $register;
    }

    public function index()
    {
        return view('auth.register-upload-member');
    }

    public function store(Request $request)
    {
        $auth = $this->register->registerUploadMember($request);
        dd($auth);
    }
}
