@extends('layout')

@section('title', 'ETML - Craftman')

@section('custom-header')
    <div class="bg">
        <h1 class="text-3xl font-bold">ETML Portes Ouvertes</h1>
        <p>Faites des activités et gagnez des points!</p>
    </div>
@endsection

@section('content')
    <h2 class="text-2xl font-bold">Craftman Challenge</h2>
    {{--Form to sign up--}}
    @auth('webadmin')
    @elseauth('web')
    @else
        <h3 class="text-xl font-semibold">S'enregistrer</h3>
        <form class="w-full max-w-lg" action="{{route('user.signUp')}}" method="post">
            {{csrf_field()}}
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'firstName', 'label'=> 'Prénom', 'type' => 'text'])
                @include('components.form-item',['id' => 'lastName', 'label'=> 'Nom de famille', 'type' => 'text'])
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'phoneNumber', 'label'=> 'Numéro de téléphone', 'type' => 'text'])
                @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email'])
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
                @include('components.form-item',['id' => 'password_confirmation', 'label'=> 'Confirmation du mot de passe', 'type' => 'password'])
            </div>
            <button class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">
                S'enregistrer
            </button>
        </form>
    @endguest
@endsection
