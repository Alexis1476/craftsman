@extends('layout')

@section('title', 'Mes activités')

@section('content')
    <h3>{{$user->anonymousID}}</h3>
    <p>{{$user->email}}</p>
    @foreach($activities as $activity)
        <h2>{{$activity->name}}</h2>
        <h4>Description :</h4>
        <p>{!!$activity->description!!}</p>
        <h4>Pourquoi :</h4>
        <p>{!!$activity->why!!}</p>
        <span><strong>Points : </strong>{{$activity->points}}</span>
        <p>Laboratoire : {{$activity->laboratory}}</p>
        @auth('webadmin')
            <a href="{{route('admin.validate',['user' => $user->anonymousID, 'activity' => $activity->id])}}">Valider</a>
        @endauth
    @endforeach
@endsection
