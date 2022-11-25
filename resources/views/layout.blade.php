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
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{route('home')}}" class="flex items-center">
                <img src="{{asset('img/logo.png')}}" class="h-6 sm:h-9 ml-3" alt="ETML logo" />
            </a>

            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false" onclick="openSideBar()">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                    <li>@include('components.nav-item', ['route' => route('home'), 'text' => 'Accueil'])</li>
                    <li>@include('components.nav-item', ['route' => route('user.login'), 'text' => 'Se connecter'])</li>
                    <li>@include('components.nav-item', ['route' => route('categories'), 'text' => 'Catégories'])</li>
                    <li>@include('components.nav-item', ['route' => route('activities'), 'text' => 'Cartes'])</li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sideBar" class="flex justify-end" >
        <aside class="w-64" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded">
                <ul class="space-y-2">
                    <li>@include('components.side-nav-item', ['route' => route('home'), 'text' => 'Accueil', 'icon' => asset('img/icons/home.svg')])</li>
                    <li>@include('components.side-nav-item', ['route' => route('user.login'), 'text' => 'Se connecter', 'icon' => asset('img/icons/login.svg')])</li>
                    <li>@include('components.side-nav-item', ['route' => route('categories'), 'text' => 'Catégories', 'icon' => asset('img/icons/categories.svg')])</li>
                    <li>@include('components.side-nav-item', ['route' => route('activities'), 'text' => 'Cartes', 'icon' => asset('img/icons/activities.svg')])</li>
                </ul>
            </div>
        </aside>
    </div>

    {{--<nav>
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
--}}

</header>
@yield('custom-header')
<main class="w-11/12 mx-auto flex flex-col items-center">
    @yield('content')
</main>
<footer>
    ETML
</footer>

<script src="{{asset('js/menu.js')}}"></script>
</body>
</html>
