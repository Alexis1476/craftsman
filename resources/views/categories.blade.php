@extends('layout')

@section('title', 'Categories')

@section('content')
    @foreach($categories as $category)
        @include('components.category-card', ['category' => $category])
    @endforeach
@endsection
