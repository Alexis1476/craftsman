@extends('layout')

@section('title', 'Categories')

@section('content')
    <div class="w-full">
        @auth('webadmin')
            @if(auth('webadmin')->user()->right === 1)
                <a href="{{route('admin.formAddActivity')}}">Ajouter</a>
            @endif
        @endauth
        @include('components.nav-item', ['route' => route('activities'), 'text' => 'Voir toutes'])
    </div>
    <div class="w-full">
        @foreach($categories as $category)
            @include('components.category-card', ['category' => $category])
        @endforeach
    </div>
@endsection
