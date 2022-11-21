@extends('layout')

@section('title', 'Profil')

@section('content')
    {{auth('webadmin')->user()->login}}
    <form action="{{route('admin.update')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item', ['id' => 'password', 'label' => 'Mot de passe', 'type' => 'password'])
        @include('components.form-item', ['id' => 'password_confirmation', 'label' => 'Confirmation du mot de passe', 'type' => 'password'])
        <button type="submit">Changer</button>
    </form>
@endsection
