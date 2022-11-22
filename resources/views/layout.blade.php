<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<header>
    <a id="logo" href="{{route('home')}}">
        <img height="20px" src="{{asset('img/logo.png')}}" alt="Logo ETML">
    </a>
    <nav>
        <ul>
            <li>@include('components.nav-item', ['route' => route('home'), 'text' => 'Accueil'])</li>
            <li>@include('components.nav-item', ['route' => route('categories'), 'text' => 'Categories'])</li>
            @auth('webadmin')
                <li>@include('components.nav-item', ['route' => route('admin.users'), 'text' => 'Visiteurs'])</li>
                <li>@include('components.nav-item', ['route' => route('admin.scores'), 'text' => 'Scores'])</li>
            @elseauth('web')
                <li>@include('components.nav-item', ['route' => route('user.profil'), 'text' => 'Mes activités'])</li>
            @endauth
        </ul>
    </nav>
    @auth('webadmin')
        @if(auth('webadmin')->user()->right === 1)
            @include('components/nav-item', ['route' => route('admin.profil'), 'text' => auth('webadmin')->user()->login])
        @else
            {{auth('webadmin')->user()->login}}
        @endif
        @include('components/nav-item', ['route' => route('admin.logout'), 'text' => 'Se deconnecter'])
    @elseauth('web')
        @include('components/nav-item', ['route' => route('user.logout'), 'text' => 'Se deconnecter'])
    @else
        @include('components/nav-item', ['route' => route('login'), 'text' => 'Se connecter'])
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
