@extends('layout')

@section('title', 'Visiteurs')

@section('content')
    @forelse($users as $user)
        <a href="{{route('admin.showUser',['id' => $user->anonymousID])}}">{{$user->anonymousID}}</a>
    @empty
        Pas de visiteurs
    @endforelse
@endsection
