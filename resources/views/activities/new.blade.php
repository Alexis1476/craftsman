@extends('layout')

@section('title', 'Nouvelle activité')

@section('content')
    <h1>Ajouter une activité</h1>
    <form action="{{route('admin.addActivity')}}" method="post">
        {{csrf_field()}}
        <label for="category">Categorie</label>
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @include('components.form-item', ['id' => 'name', 'label' => 'Nom', 'type' => 'text'])
        @include('components.textarea', ['id' => 'description', 'label' => 'Description', 'type' => 'text', 'value' => $activity->description])
        @include('components.textarea', ['id' => 'why', 'label' => 'Pourquoi', 'type' => 'text', 'value' => $activity->why])
        @include('components.form-item', ['id' => 'points', 'label' => 'Points', 'type' => 'number'])
        @include('components.form-item', ['id' => 'laboratory', 'label' => 'Laboratoire', 'type' => 'text'])
        <button type="submit">Ajouter</button>
    </form>
@endsection
