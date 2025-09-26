@extends('admin.layouts.app')

@section('content')

    <a href="{{ route('users.index') }}">Back</a>

    <h1>New User</h1>

    <form action=" {{ route('users.storage') }}  " method="POST">
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Send</button>
    @csrf()
    </form> 

@endsection