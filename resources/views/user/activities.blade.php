@extends('layout')

@section('title', "Profil $user->anonymousID")

@section('content')
    <h1 class="font-bold mb-2 text-3xl text-[#371877]">{{$user->anonymousID}}</h1>
    <p class="italic">{{$user->email}}</p>
    @if(isset($score))
        <p><strong>Mes points :</strong> {{$score}}</p>
    @endif
    <div>
        <h3 class="font-bold text-xl">Activités</h3>
        @foreach($activities as $activity)
            <img src="{{asset("img/categories/$activity->category->img")}}" alt="Categorie">
            <h3>{{$activity->name}}</h3>
            <h4>Description :</h4>
            <p>{!!$activity->description!!}</p>
            <h4>Pourquoi :</h4>
            <p>{!!$activity->why!!}</p>
            <span><strong>Points : </strong>{{$activity->points}}</span>
            <p>Laboratoire : {{$activity->laboratory}}</p>
            @auth('webadmin')
                <a href="{{route('admin.validateActivity',['user' => $user->anonymousID, 'activity' => $activity->id])}}">Valider</a>
            @endauth
        @endforeach
    </div>
@endsection
