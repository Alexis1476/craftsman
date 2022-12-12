@extends('layout')

@section('title', isset($category) ? $category->name : 'Activités')

@section('content')
    @if(isset($category))
        <h1 class="text-3xl font-bold mb-8">{{$category->name}}</h1>
        <img class="mb-8" src="{{asset("img/categories/$category->image")}}" alt="{{$category->name}}">
    @else
        <h1 class="text-3xl font-bold mb-8">Activités</h1>
    @endif
    @if(count($activities) > 0)
        <table class="text-sm text-left text-gray-500 table-auto max-w-[90%] mx-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="p-3"> Nom</th>
                <th class="p-3"> Laboratoire</th>
                <th class="p-3"> Points</th>
                @isset(auth('webadmin')->user()->right)
                    @if(auth('webadmin')->user()->right === 1)
                        <th class="p-3">Action</th>
                    @endif
                @endisset
            </tr>
            </thead>
            <tbody>
            @foreach($activities as $activity)
                <tr class="hover:bg-gray-50">
                    <th class="p-3 font-medium text-gray-900">
                        <a href="{{route('activities.show',['id' => $activity->id])}}"
                           class="font-medium text-blue-600 hover:underline">{{$activity->name}}</a>
                    </th>
                    <td class="p-3">{{$activity->laboratory}}</td>
                    <td class="p-3">{{$activity->points}}</td>
                    @isset(auth('webadmin')->user()->right)
                        @if(auth('webadmin')->user()->right === 1)
                            <td class="p-3">
                                <form class="flex justify-center items-center"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette activité?');"
                                      action="{{route('activities.destroy', ['id' => $activity->id])}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button title="delete" type="submit">
                                        <img class="h-4"
                                             src="{{asset('img/icons/trash.svg')}}"
                                             alt="">
                                    </button>
                                </form>
                            </td>
                        @endif
                    @endisset
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>Il n'y a pas d'activités actuellement</h3>
    @endif
@endsection
