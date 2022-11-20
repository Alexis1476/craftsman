@extends('layout')

@section('title', 'ETML - Craftman Login')

@section('content')
    {{--Form user login--}}
    <form action="{{route('user.login')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email'])
        @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
        <button type="submit">Se connecter</button>
    </form><br><br>
    {{--Form to sign up--}}
    <h2>S'enregistrer</h2>
    <form action="{{route('user.signUp')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item',['id' => 'firstName', 'label'=> 'Prénom', 'type' => 'text'])
        @include('components.form-item',['id' => 'lastName', 'label'=> 'Nom de famille', 'type' => 'text'])
        @include('components.form-item',['id' => 'phoneNumber', 'label'=> 'Numéro de téléphone', 'type' => 'text'])
        @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email'])
        @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
        @include('components.form-item',['id' => 'password_confirmation', 'label'=> 'Confirmation du mot de passe', 'type' => 'password'])
        <button type="submit">S'enregistrer</button>
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
