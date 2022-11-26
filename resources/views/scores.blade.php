@extends('layout')

@section('title', 'ETML - Craftman scores')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Scores</h1>
    @if(count($scores) > 0)
        <table class="text-sm text-left text-gray-500 table-auto max-w-[90%] mx-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="p-3"></th>
                <th class="p-3">ID</th>
                <th class="p-3">Points</th>
            </tr>
            </thead>
            <tbody>
            @php $counter = 1; @endphp
            @foreach($scores as $score)
                <tr class="hover:bg-gray-50">
                    <td class="p-3">{{$counter++}}</td>
                    <th class="p-3 font-medium text-gray-900">
                        <a href="{{route('admin.showUser',['id' => $score->user])}}"
                           class="font-medium text-blue-600 hover:underline">{{$score->user}}</a>
                    </th>
                    <td class="p-3">{{$score->total}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3>Il n'y a pas actuellement de visiteurs</h3>
    @endif
@endsection
