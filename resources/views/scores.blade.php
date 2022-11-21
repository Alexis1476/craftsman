@extends('layout')

@section('title', 'ETML - Craftman scores')

@section('content')
@forelse($scores as $score)
    <h2>{{$score->user}}  {{$score->total}}</h2>
@empty
    Pas de visiteurs
@endforelse
@endsection
