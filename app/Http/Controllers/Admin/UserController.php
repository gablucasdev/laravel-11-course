<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) {
        User::create($request -> validated());

        return redirect()
        ->route('users.index')
        ->with('success', 'User Created With Success!');


    }

    public function edit(string $id) {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User Not Found!');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id) {
        if (!$user = User::find($id)) {
            return back()->with('message', 'User Not Found!');
        }

        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
        ->route('users.index')
        ->with('success', 'User Edited With Success!');
    }

    public function show(string $id) {

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User Not Found!');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id) {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User Not Found!');
    }

        $user->delete();

        return redirect()
        ->route('users.index')
        ->with('success', 'User Deleated With Success!');

    }

}