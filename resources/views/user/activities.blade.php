@extends('layout')

@section('title', "Profil $user->anonymousID")

@section('content')
    <h1 class="font-bold mb-2 text-3xl text-[#371877]">{{$user->anonymousID}}</h1>
    <p class="italic">{{$user->email}}</p>
    @if(isset($score))
        <p><strong>Total de points :</strong> {{$score}}</p>
    @endif
    <div class="flex flex-wrap gap-5 justify-center my-6">
        @foreach($activities as $activity)
            @include('components.activity-card', ['activity' => $activity, 'imgCategory' => $activity->category->image])
        @endforeach
    </div>
@endsection
