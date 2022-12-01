@extends('layout')

@section('title', "$activity->name")

@section('content')
    <h1 class="text-3xl font-bold mb-8">{{$activity->name}}</h1>
    @auth('webadmin')
        {{--Si l'admin est un prof--}}
        @if(auth('webadmin')->user()->right === 1)
            @include('components.activity-form',['route' => route('admin.updateActivity'), 'categories' => $categories, 'activity' => $activity])
        @else
            <div class="space-y-4">
                <p><strong>Description :</strong> {!!$activity->description!!}</p>
                <p><strong>Pourquoi ? :</strong> {!!$activity->why!!}</p>
                <p><strong>Points :</strong> {{$activity->points}}</p>
                <p><strong>Laboratoire :</strong> {{$activity->laboratory}}</p>
            </div>
        @endif
    @else
        <div class="space-y-4">
            <p><strong>Description :</strong> {!!$activity->description!!}</p>
            <p><strong>Pourquoi ? :</strong> {!!$activity->why!!}</p>
            <p><strong>Points :</strong> {{$activity->points}}</p>
            <p><strong>Laboratoire :</strong> {{$activity->laboratory}}</p>
        </div>
    @endauth
@endsection
