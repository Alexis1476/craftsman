@extends('layout')

@section('title', "$activity->name")

@section('content')
    <h1 class="text-3xl font-bold mb-8 mt-4">{{$activity->name}}</h1>
    @auth('webadmin')
        {{--Si l'admin est un prof--}}
        @if(auth('webadmin')->user()->right === 1)
            @include('components.activity-form',['route' => route('admin.addActivity'), 'categories' => $categories, 'activity' => $activity])
        @else
            <div class="flex flex-col space-y-4 border-red border-2 rounded-md p-8 shadow-md mt-8 mr-4 ml-4">
                @php $img = $activity->category->image; @endphp
                <img src="{{asset("img/categories/$img")}}" alt="Category image" class="self-center">

                <p class="flex flex-col"><strong>Description</strong> {!!$activity->description!!}</p>
                <p class="flex flex-col"><strong>Pourquoi ?</strong> {!!$activity->why!!}</p>
                <p class="flex flex-col"><strong>Points</strong> {{$activity->points}}</p>
                <p class="flex flex-col"><strong>Laboratoire</strong> {{$activity->laboratory}}</p>
            </div>
        @endif
    @else
        <div class="flex flex-col space-y-4 border-red border-2 rounded-md p-8 shadow-md mt-8 mr-4 ml-4">
            @php $img = $activity->category->image; @endphp
            <img src="{{asset("img/categories/$img")}}" alt="Category image" class="self-center">

            <p class="flex flex-col"><strong>Description</strong> {!!$activity->description!!}</p>
            <p class="flex flex-col"><strong>Pourquoi ?</strong> {!!$activity->why!!}</p>
            <p class="flex flex-col"><strong>Points</strong> {{$activity->points}}</p>
            <p class="flex flex-col"><strong>Laboratoire</strong> {{$activity->laboratory}}</p>
        </div>
    @endauth
@endsection
