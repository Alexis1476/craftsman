@extends('layout')

@section('title', 'Visiteurs')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Visiteurs</h1>
    @forelse($users as $user)
        <a href="{{route('admin.showUser',['id' => $user->anonymousID])}}">{{$user->anonymousID}}</a>
    @empty
        Pas de visiteurs
    @endforelse
@endsection
