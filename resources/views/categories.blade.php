@extends('layout')

@section('title', 'Categories')

@section('content')
    @auth('webadmin')
        @if(auth('webadmin')->user()->right === 1)
            <a href="{{route('admin.formAddActivity')}}">Ajouter</a>
        @endif
    @endauth
    @include('components.nav-item', ['route' => route('activities'), 'text' => 'Voir toutes'])
    @foreach($categories as $category)
        @include('components.category-card', ['category' => $category])
    @endforeach
@endsection
