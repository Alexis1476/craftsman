@extends('layout')

@section('title', 'Activités')

@section('content')
    @if(isset($category))
        <h2>{{$category->name}}</h2>
        <img src="{{asset("img/activities/$category->image")}}" alt="{{$category->name}}">
    @endif
    @foreach($activities as $activity)
        <a href="{{route('activity',['id' => $activity->id])}}">{{$activity->name}}</a>
        <span><strong>Points : </strong>{{$activity->points}}</span>
        <p>Laboratoire : {{$activity->laboratory}}</p>
    @endforeach
@endsection
