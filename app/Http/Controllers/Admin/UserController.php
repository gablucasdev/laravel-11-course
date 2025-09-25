<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $user = User::first();
        return "Bem vindo {$user->name}, ({$user->email})";
    }
}

