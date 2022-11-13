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
    <a id="logo" href="{{route('home')}}">ETML</a>
    <nav>
        <ul>
            @include('components/nav-item', ['route' => route('home'), 'text' => 'Accueil'])
            {{--TODO : Condition if visitor is connected--}}
            @include('components/nav-item', ['route' => route('activities'), 'text' => 'Activités'])
        </ul>
    </nav>
    {{--TODO: Gerer auth--}}
    <a class="nav-item" href="">Log in</a>
</header>
<main>
    @yield('content')
</main>
<footer>
    ETML
</footer>
</body>
</html>
