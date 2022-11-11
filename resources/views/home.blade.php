@extends('layout')

@section('content')
    <h1>ETML Portes Ouvertes</h1>
    {{--Form user login--}}
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
    {{--Form to sign up--}}
    <h2>S'enregistrer</h2>
    <form action="{{route('signUp')}}" method="post">
        {{csrf_field()}}
        <label for="firstName">Prenom</label>
        <input name="firstName" id="firstName" type="text">
        @if($errors->has('firstName'))
            <p>{{$errors->first('firstName')}}</p>
        @endif
        <label for="lastName">Nom de famille</label>
        <input name="lastName" id="lastName" type="text">
        @if($errors->has('lastName'))
            <p>{{$errors->first('lastName')}}</p>
        @endif
        <label for="phoneNumber">Numéro de téléphone</label>
        <input name="phoneNumber" id="phoneNumber" type="text">
        @if($errors->has('phoneNumber'))
            <p>{{$errors->first('phoneNumber')}}</p>
        @endif
        <label for="email">Email</label>
        <input name="email" id="email" type="text">
        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
        <button type="submit">S'enregistrer</button>
    </form>
@endsection
