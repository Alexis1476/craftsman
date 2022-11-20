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
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        @if($errors->has('description'))
            <p>{{$errors->first('description')}}</p>
        @endif
        <label for="why">Pourquoi</label>
        <textarea name="why" id="why" cols="30" rows="10"></textarea>
        @if($errors->has('why'))
            <p>{{$errors->first('why')}}</p>
        @endif
        @include('components.form-item', ['id' => 'points', 'label' => 'Points', 'type' => 'number'])
        @include('components.form-item', ['id' => 'laboratory', 'label' => 'Laboratoire', 'type' => 'text'])
        <button type="submit">Ajouter</button>
    </form>
@endsection
