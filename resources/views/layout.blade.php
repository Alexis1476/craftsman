<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="manifest" href="{{asset('resources/css/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col h-full">
<header>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="{{route('home')}}" class="flex items-center">
                    <img src="{{asset('img/logo.svg')}}" class="h-12 ml-3" alt="ETML logo"/>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-default" aria-expanded="false" onclick="openSideBar()">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-base md:font-medium md:border-0 md:bg-white">
                        <li>@include('components.nav-item', ['route' => route('home'), 'text' => 'Accueil'])</li>
                        <li>@include('components.nav-item', ['route' => route('categories.index'), 'text' => 'Catégories'])</li>
                        <li>@include('components.nav-item', ['route' => route('activities.index'), 'text' => 'Cartes'])</li>
                        @auth('webadmin')
                            @if(auth('webadmin')->user()->right === 1)
                                <li>@include('components.nav-item', ['route' => route('admin.show'), 'text' => auth('webadmin')->user()->login])</li>
                            @else
                                <li>@include('components.nav-item', ['route' => '#', 'text' => auth('webadmin')->user()->login])</li>
                            @endif
                            <li>@include('components.nav-item', ['route' => route('admin.scores'), 'text' => 'Score'])</li>
                            <li>@include('components.nav-item', ['route' => route('admin.users'), 'text' => 'Visiteurs'])</li>
                            <li>@include('components.nav-item', ['route' => route('admin.logout'), 'text' => 'Se déconnecter'])</li>
                        @elseauth('web')
                            <li>@include('components.nav-item', ['route' => route('user.profil'), 'text' => 'Mes activités'])</li>
                            <li>@include('components.nav-item', ['route' => route('user.logout'), 'text' => 'Se déconnecter'])</li>
                        @else
                            <li>@include('components.nav-item', ['route' => route('login'), 'text' => 'Se connecter'])</li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="sideBar" class="flex justify-end absolute right-1 z-20">
        <aside class="w-64" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded">
                <ul class="space-y-2">
                    <li>@include('components.side-nav-item', ['route' => route('home'), 'text' => 'Accueil', 'icon' => asset('img/icons/home.svg')])</li>
                    <li>@include('components.side-nav-item', ['route' => route('categories.index'), 'text' => 'Catégories', 'icon' => asset('img/icons/categories.svg')])</li>
                    <li>@include('components.side-nav-item', ['route' => route('activities.index'), 'text' => 'Cartes', 'icon' => asset('img/icons/activities.svg')])</li>
                    @auth('webadmin')
                        @if(auth('webadmin')->user()->right === 1)
                            @include('components.side-nav-item', ['route' => route('admin.show'), 'text' => auth('webadmin')->user()->login, 'icon' => asset('img/icons/login.svg')])
                        @else
                            @include('components.side-nav-item', ['route' => '#', 'text' => auth('webadmin')->user()->login, 'icon' => asset('img/icons/login.svg')])
                        @endif
                        @include('components.side-nav-item', ['route' => route('admin.scores'), 'text' => 'Score', 'icon' => asset('img/icons/score.svg')])
                        @include('components.side-nav-item', ['route' => route('admin.users'), 'text' => 'Visiteurs', 'icon' => asset('img/icons/users.svg')])
                        @include('components.side-nav-item', ['route' => route('admin.logout'), 'text' => 'Se deconnecter', 'icon' => asset('img/icons/logout.svg')])
                    @elseauth('web')
                        @include('components.side-nav-item', ['route' => route('user.profil'), 'text' => 'Mes activités', 'icon' => asset('img/icons/userActivities.svg')])
                        @include('components.side-nav-item', ['route' => route('user.logout'), 'text' => 'Se deconnecter', 'icon' => asset('img/icons/logout.svg')])
                    @else
                        @include('components.side-nav-item', ['route' => route('login'), 'text' => 'Se connecter', 'icon' => asset('img/icons/login.svg')])
                    @endauth
                </ul>
            </div>
        </aside>
    </div>
</header>
@yield('custom-header')
<main class="w-full mx-auto flex flex-col items-center grow">
    @yield('content')
</main>
<footer class="p-4 bg-white rounded-lg shadow md:flex items-center text-center md:justify-between md:p-6 md:flex-col">
    <span class="text-sm text-gray-500">© 2022 ETML. Tous droits réservés.</span>
    <div class="flex space-x-2 justify-center">
        <a href="https://github.com/Alexis1476" target="_blank"
           class="flex items-center justify-center hover:text-violet-700">
            <img class="w-4 h-4 mr-2" src="{{asset('img/icons/github.svg')}}" alt="Github">
            Alexis Rojas >
        </a>
        <a href="https://github.com/KendySong" target="_blank"
           class="flex items-center justify-center hover:text-violet-700">
            Kendy Song
        </a>
    </div>
</footer>
<script src="{{asset('js/menu.js')}}"></script>
</body>
</html>
