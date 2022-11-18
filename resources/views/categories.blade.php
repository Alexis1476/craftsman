@extends('layout')

@section('title', 'Categories')

@section('content')

@foreach($categories as $category)
    <h2>{{$category->name}}</h2>
    <img src="{{asset("img/activities/$category->image")}}" alt="{{$category->name}}">
    <p>{{$category->description}}</p>
@endforeach

@endsection
