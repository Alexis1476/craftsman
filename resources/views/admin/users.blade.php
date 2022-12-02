@extends('layout')

@section('title', 'Visiteurs')

@section('content')
    <h1 class="text-3xl font-bold mb-8 mt-8">Visiteurs</h1>
    <form class="flex items-center" action="{{route('admin.searchUser')}}" method="post">
        {{csrf_field()}}
        @include('components.form-item', ['id' => 'id', 'label' => 'User ID', 'type' => 'text'])
        <button class="mx-auto bg-[#371877] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full h-fit"
                type="submit">Chercher
        </button>
    </form>
    @if(count($users) > 0)
        <table class="text-sm text-left text-gray-500 table-auto max-w-[90%] mx-auto mt-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Prénom</th>
                <th class="p-3">Nom</th>
                <th class="p-3">Email</th>
                <th class="p-3">Points</th>
                @isset(auth('webadmin')->user()->right)
                    @if(auth('webadmin')->user()->right === 1)
                        <th class="p-3">Action</th>
                    @endif
                @endisset
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <th class="p-3 font-medium text-gray-900">
                        <a href="{{route('admin.showUser',['id' => $user->anonymousID])}}"
                           class="font-medium text-blue-600 hover:underline">{{$user->anonymousID}}</a>
                    </th>
                    <td class="p-3">{{$user->firstName}}</td>
                    <td class="p-3">{{$user->lastName}}</td>
                    <td class="p-3">{{$user->email}}</td>
                    <td class="p-3">{{$user->score()}}</td>
                    @isset(auth('webadmin')->user()->right)
                        @if(auth('webadmin')->user()->right === 1)
                            <td class="p-3">
                                <form class="flex justify-center items-center" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur?');"
                                      action="{{route('admin.userDelete', ['id' => $user->id])}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button title="delete" type="submit"><img class="h-4"
                                                                              src="{{asset('img/icons/trash.svg')}}"
                                                                              alt=""></button>
                                </form>
                            </td>
                        @endif
                    @endisset
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>Il n'y a pas actuellement de visiteurs</h3>
    @endif
@endsection
