@extends('layout')

@section('title', 'ETML - Craftman scores')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Scores</h1>
    @forelse($scores as $score)
        <h2>{{$score->user}}  {{$score->total}}</h2>
    @empty
        Pas de visiteurs
    @endforelse
@endsection
