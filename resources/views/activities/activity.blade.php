@extends('layout')

@section('title', "$activity->name")

@section('content')
    <h1 class="text-3xl font-bold mb-8">{{$activity->name}}</h1>
    @auth('webadmin')
        {{--Si l'admin est un prof--}}
        @if(auth('webadmin')->user()->right === 1)
            @include('components.activity-form',['route' => route('admin.addActivity'), 'categories' => $categories, 'activity' => $activity])
        @endif
    @else
        <p>Description : {!!$activity->description!!}</p>
        <p>Pourquoi : {!!$activity->why!!}</p>
        <p>Points : {{$activity->points}}</p>
        <p>Laboratoire : {{$activity->laboratory}}</p>
    @endauth
@endsection
