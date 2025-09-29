@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <!-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif -->

    <x-alert/>

    <a href="{{ route('users.index') }}">Back</a>

    <h1>New User</h1>
 
    <form action=" {{ route('users.storage') }}  " method="POST">
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Send</button>
    @csrf()
    </form> 

@endsection

<!-- mo carinha de q eu fiz merda kkkkkkkkkkkkk oq rolou? nada dmais n -->