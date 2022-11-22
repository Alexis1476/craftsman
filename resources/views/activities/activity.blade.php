@extends('layout')

@section('title', "$activity->name")

@section('content')
    @auth('webadmin')
        {{--Si l'admin est un prof--}}
        @if(auth('webadmin')->user()->right === 1)
            <form action="{{route('admin.updateActivity')}}" method="post">
                {{csrf_field()}}
                <label for="category">Categorie</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{$category->id === $activity->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @include('components.form-item', ['id' => 'id', 'label' => '', 'type' => 'hidden', 'value' => $activity->id])
                @include('components.form-item', ['id' => 'name', 'label' => 'Nom', 'type' => 'text', 'value' => $activity->name])
                @include('components.textarea', ['id' => 'description', 'label' => 'Description', 'type' => 'text', 'value' => $activity->description])
                @include('components.textarea', ['id' => 'why', 'label' => 'Pourquoi', 'type' => 'text', 'value' => $activity->why])
                @include('components.form-item', ['id' => 'points', 'label' => 'Points', 'type' => 'number', 'value' => $activity->points])
                @include('components.form-item', ['id' => 'laboratory', 'label' => 'Laboratoire', 'type' => 'text', 'value' => $activity->laboratory])
                <button type="submit">Modifier</button>
            </form>
        @endif
    @else
        <h1>{{$activity->name}}</h1>
        <p>Description : {!!$activity->description!!}</p>
        <p>Pourquoi : {!!$activity->why!!}</p>
        <p>Points : {{$activity->points}}</p>
        <p>Laboratoire : {{$activity->laboratory}}</p>
    @endauth
@endsection
