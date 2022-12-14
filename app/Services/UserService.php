<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(User $userModel)
    {
        $this->user_model = $userModel;
    }

    public function getListUser()
    {
        $data = $this->user_model->all();
        return $data;
    }
}
