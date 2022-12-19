@extends('layout')

@section('title', 'Profil')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Modifier le mot de passe</h1>
    <form class="w-full max-w-lg" action="{{route('admin.update')}}" method="post">
        {{csrf_field()}}
        <div class="flex flex-wrap -mx-3 mb-2">
            @include('components.form-item', ['id' => 'password', 'label' => 'Mot de passe', 'type' => 'password'])
            @include('components.form-item', ['id' => 'password_confirmation', 'label' => 'Confirmation du mot de passe', 'type' => 'password'])
        </div>
        <button class="mx-auto bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">Changer</button>
    </form>
@endsection
