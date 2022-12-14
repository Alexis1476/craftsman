@extends('layout')

@section('title', 'Connexion')

@section('content')
    {{--Form user login--}}
    <h1 class="text-3xl font-bold mb-8">Connexion</h1>
    <div class="w-11/12 mx-auto">
        <div class="flex flex-col my-4">
            <form class="max-w-lg mx-auto" action="{{route('loginPost')}}" method="post">
                {{csrf_field()}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    @include('components.form-item',['id' => 'login', 'label'=> 'Email / Login', 'type' => 'text', 'placeholder'=> 'nom@exemple.com'])
                    @include('components.form-item',['id' => 'password', 'label'=> 'Mot de passe', 'type' => 'password', 'placeholder'=> '********'])
                </div>
                <button class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">
                    Se connecter
                </button>
            </form>
        </div>
@endsection
