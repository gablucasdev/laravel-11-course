@extends('admin.layouts.app')

@section('title', 'Criar Novo Usuário')

@section('content')
    <a href="{{ route('users.index') }}">Back</a>
    <h1>New User</h1>
    <form action=" {{ route('users.store') }}  " method="POST">
    @include('admin.users.partials.form')
    </form> 
@endsection