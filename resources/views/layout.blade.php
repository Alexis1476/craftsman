<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETML-Craftman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
    <span>ETML</span>
    <nav>
        <ul>
            <li>@include('partials/nav-item', ['route' => route('home'), 'text' => 'Accueil'])</li>
            {{--TODO : Condition if visitor is connected--}}
            <li>@include('partials/nav-item', ['route' => route('myActivities'), 'text' => 'Mes activités'])</li>
        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>

</footer>
</body>
</html>
