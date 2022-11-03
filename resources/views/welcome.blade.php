@extends('layout')

@section('content')
    <h1>ETML Portes Ouvertes</h1>
    <form action="#">
        <label for="login">Login</label>
        <input id="login" type="text">
        <label for="password">Password</label>
        <input type="password" id="password">
        <button type="submit">Se connecter</button>
    </form>
@endsection
