@extends('layout')

@section('title', 'Nouvelle activité')

@section('content')
    <h1>Ajouter une activité</h1>
    <form class="w-full max-w-lg" action="{{route('admin.addActivity')}}" method="post">
        {{csrf_field()}}
        <div class="flex flex-wrap -mx-3 mb-2">
            @include('components.form-item', ['id' => 'name', 'label' => 'Nom', 'type' => 'text'])
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 grow">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Category
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            @include('components.textarea', ['id' => 'description', 'label' => 'Description', 'type' => 'text'])
            @include('components.textarea', ['id' => 'why', 'label' => 'Pourquoi', 'type' => 'text'])
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            @include('components.form-item', ['id' => 'points', 'label' => 'Points', 'type' => 'number'])
            @include('components.form-item', ['id' => 'laboratory', 'label' => 'Laboratoire', 'type' => 'text'])
        </div>
        <button class="mx-auto bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full" type="submit">Ajouter</button>
    </form>
@endsection
