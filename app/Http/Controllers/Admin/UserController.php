<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = $this->user->getListUser();
        return view('admin.user.index', compact('users'));
    }
}
