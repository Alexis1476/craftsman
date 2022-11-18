@extends('layout')

@section('title', 'Categories')

@section('content')

@foreach($categories as $category)
    <h2>{{$category->name}}</h2>
@endforeach

@endsection
