@extends('layout')

@section('title', 'ETML - Craftman Login')

@section('content')
    {{--Form user login--}}
    <h1>LOGIN USER</h1>
    <form action="{{route('user.login')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email'])
        @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
        <button type="submit">Se connecter</button>
    </form><br><br>
    <h1>LOGIN ADMIN</h1>
    {{--Form user login--}}
    <form action="{{route('admin.login')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item',['id' => 'login', 'label'=> 'Nom d\'utilisateur', 'type' => 'text'])
        @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
        <button type="submit">Se connecter</button>
    </form>
@endsection
