<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
    <div></div>
    <a href="#">Accueil</a>
</header>
<main>
    @yield('content')
</main>
<footer>

</footer>
</body>
</html>
