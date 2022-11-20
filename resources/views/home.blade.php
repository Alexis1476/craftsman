@extends('layout')

@section('title', 'ETML - Craftman')

@section('custom-header')
    <div class="bg">
        <h1>ETML Portes Ouvertes</h1>
        <p>Faites des activités et gagnez des points!</p>
    </div>
@endsection

@section('content')
    <h2>Craftman Challenge</h2>
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
    </form>

@endsection
