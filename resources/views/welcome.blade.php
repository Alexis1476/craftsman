@extends('layout')

@section('content')
    <h1>ETML Portes Ouvertes</h1>
    <form action="{{route('login')}}" method="post">
        {{csrf_field()}}
        <label for="login">Login</label>
        <input name="login" id="login" type="text">
        @if($errors->has('login'))
            <p>{{$errors->first('login')}}</p>
        @endif
        <label for="password">Password</label>
        <input name="password" type="password" id="password">
        @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
        <button type="submit">Se connecter</button>
    </form>
@endsection
