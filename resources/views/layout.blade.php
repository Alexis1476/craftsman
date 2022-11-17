<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<header>
    <a id="logo" href="{{route('home')}}">
        <img height="20px" src="{{asset('images/logo.png')}}" alt="Logo ETML">
    </a>
    <nav>
        <ul>
            @include('components/nav-item', ['route' => route('home'), 'text' => 'Accueil'])
            {{--TODO : Condition if visitor is connected--}}
            @include('components/nav-item', ['route' => route('activities'), 'text' => 'Activités'])
        </ul>
    </nav>
    {{--TODO: Gerer auth--}}
    @auth('webadmin')
        {{auth('webadmin')->user()->login}}
        <a class="nav-item" href="{{route('admin.logout')}}">Se deconnecter</a>
    @elseauth('web')
        {{auth()->user()->anonymousID}}
        <a class="nav-item" href="{{route('user.logout')}}">Se deconnecter</a>
    @else
        <a class="nav-item" href="{{route('login')}}">Se connecter</a>
    @endauth
</header>
@yield('custom-header')
<main>
    @yield('content')
</main>
<footer>
    ETML
</footer>
</body>
</html>
