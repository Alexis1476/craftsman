@extends('layout')

@section('title', 'ETML - Craftsman')

@section('custom-header')
    
@endsection

@section('content')

    <div class="justify-center flex flex-col items-center bg-[#371877] w-full h-64 text-white">
        <h1 class="text-3xl font-bold">ETML Portes Ouvertes</h1>
        <p>Faites des activités et gagnez des points!</p>
        <h2 class="text-2xl font-bold">Craftsman Challenge</h2>
    </div>

    {{--Form to sign up--}}
    @auth('webadmin')
    @elseauth('web')
    @else
    <div class="w-11/12 mx-auto">
        <form class="w-full max-w-lg" action="{{route('user.signUp')}}" method="post">
            <h3 class="text-2xl font-semibold my-4 text-center">S'enregistrer</h3>
            {{csrf_field()}}
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'firstName', 'label'=> 'Prénom', 'type' => 'text', 'placeholder'=> 'Prénom'])
                @include('components.form-item',['id' => 'lastName', 'label'=> 'Nom de famille', 'type' => 'text', 'placeholder'=> 'Nom'])
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'phoneNumber', 'label'=> 'Numéro de téléphone', 'type' => 'text', 'placeholder'=> '0761231235'])
                @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email', 'placeholder'=> 'nom@exemple.com'])
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password', 'placeholder'=> '********'])
                @include('components.form-item',['id' => 'password_confirmation', 'label'=> 'Confirmation du mot de passe', 'type' => 'password', 'placeholder'=> '********'])
            </div>
            <button class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">
                S'enregistrer
            </button>
        </form>
    </div>
        
    @endguest
@endsection
