<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    public function create ()
    {
        return view('admin.users.create');
    }

    public function storage (StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect()
        ->route('users.index')
        ->with('success', 'User created successfully');
    }

    public function edit (string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não Encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }
} 