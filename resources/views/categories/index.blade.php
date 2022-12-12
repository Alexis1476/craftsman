@extends('layout')

@section('title', 'Categories')

@section('content')
    <div class="w-11/12 mx-auto flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-8 mt-4">Categories</h1>
        <div class="w-full my-4 flex justify-center space-x-4">
            @auth('webadmin')
                @if(auth('webadmin')->user()->right === 1)
                    <a class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full"
                       href="{{route('activities.create')}}">Créer activité</a>
                @endif
            @endauth
            <a class="bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full"
               href="{{route('activities.index')}}">Voir tout</a>
        </div>
        <div class="w-full">
            @foreach($categories as $category)
                @include('components.category-card', ['category' => $category])
            @endforeach
        </div>
    </div>
@endsection
