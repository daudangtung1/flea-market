<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\RegisterService;

class RegisterDownloadMemberController extends Controller
{
    public function __construct(RegisterService $register)
    {
        $this->register = $register;
    }
    public function index()
    {
        return view('auth.register-download-member');
    }

    public function store(Request $request)
    {
        $auth = $this->register->registerDownloadMember($request);
        dd($auth);
    }
}
