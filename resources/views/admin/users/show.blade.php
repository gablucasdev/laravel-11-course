@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
    <h1>User Details</h1>
    <ul>
        <li>Nome: {{ $user->name }}</li>
        <li>E-mail: {{ $user->email }}</li>
    </ul>
    <x-alert/>
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <button type='submit'>Delete</button>
    </form>
@endsection
