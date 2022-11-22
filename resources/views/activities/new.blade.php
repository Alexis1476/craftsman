@extends('layout')

@section('title', 'Nouvelle activité')

@section('content')
    <h1>Ajouter une activité</h1>
    @include('components.activity-form',['route' => route('admin.addActivity'), 'categories' => $categories])
@endsection
