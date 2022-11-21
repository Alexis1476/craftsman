@extends('layout')

@section('title', 'Activités')

@section('content')
    @foreach($activities as $activity)
        <a href="{{route('activity',['id' => $activity->id])}}">{{$activity->name}}</a>
        <h4>Description :</h4>
        <p>{!!$activity->description!!}</p>
        <h4>Pourquoi :</h4>
        <p>{!!$activity->why!!}</p>
        <span><strong>Points : </strong>{{$activity->points}}</span>
        <p>Laboratoire : {{$activity->laboratory}}</p>
    @endforeach
@endsection
