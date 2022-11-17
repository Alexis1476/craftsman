@extends('layout')

@section('title', 'Mes activités')

@section('content')
    @foreach($activities as $activity)
        <h2>{{$activity->name}}</h2>
        <h4>Description :</h4>
        <p>{!!$activity->description!!}</p>
        <h4>Pourquoi :</h4>
        <p>{!!$activity->why!!}</p>
        <span><strong>Points : </strong>{{$activity->points}}</span>
        <p>Laboratoire : {{$activity->laboratory}}</p>
    @endforeach
@endsection
