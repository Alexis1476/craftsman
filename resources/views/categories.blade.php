@extends('layout')

@section('title', 'Categories')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Categories</h1>
    <div class="w-full my-4 flex justify-center">
        @auth('webadmin')
            @if(auth('webadmin')->user()->right === 1)
                <a class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" href="{{route('admin.formAddActivity')}}">Ajouter</a>
            @endif
        @endauth
            <a class="ml-5 bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" href="{{route('activities')}}">Voir tout</a>
    </div>
    <div class="w-full">
        @foreach($categories as $category)
            @include('components.category-card', ['category' => $category])
        @endforeach
    </div>
@endsection
