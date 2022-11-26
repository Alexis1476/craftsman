@extends('layout')

@section('title', 'Visiteurs')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Visiteurs</h1>
    <form class="flex items-center" action="{{route('admin.searchUser')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item', ['id' => 'id', 'label' => 'User ID', 'type' => 'text'])
        <button class="mx-auto bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full h-fit"
                type="submit">Chercher
        </button>
    </form>
    @forelse($users as $user)
        <a href="{{route('admin.showUser',['id' => $user->anonymousID])}}">{{$user->anonymousID}}</a>
    @empty
        Pas de visiteurs
    @endforelse
@endsection
