@extends('layout')

@section('title', 'ETML - Craftman scores')

@section('content')
@foreach($scores as $score)
    <h2>{{$score->user}}  {{$score->total}}</h2>
@endforeach
@endsection
