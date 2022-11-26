@extends('layout')

@section('title', 'ETML - Craftman Login')

@section('content')
    {{--Form user login--}}
    <div class="flex flex-col my-4">

        <form class="w-full max-w-lg" action="{{route('user.login')}}" method="post">
            <h3 class="text-xl font-semibold my-4 text-center">Visiteur</h3>
            {{csrf_field()}}
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'email', 'label'=> 'Email', 'type' => 'email'])
                @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password'])
            </div>
            <button class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">Se
                connecter
            </button>
        </form>
    </div>
    <div class="flex flex-col my-4">
        <h3 class="text-xl font-semibold my-4 text-center">Admin</h3>
        {{--Form user login--}}
        <form class="w-full max-w-lg" action="{{route('admin.login')}}" method="post">
            {{csrf_field()}}
            <div class="flex flex-wrap -mx-3 mb-2">
                @include('components.form-item',['id' => 'login', 'label'=> 'Nom d\'utilisateur', 'type' => 'text'])
                @include('components.form-item',['id' => 'password_admin', 'label'=> 'Mot de passe', 'type' => 'password'])
            </div>
            <button class="mx-auto bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full"
                    type="submit">Se connecter
            </button>
        </form>
    </div>
@endsection
