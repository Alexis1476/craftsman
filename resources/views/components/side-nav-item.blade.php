
<a href="{{$route}}"
   class="side-nav-item {{ request()->url() === $route ? 'flex flex-row block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0' : 'flex flex-row block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0'}}">
    <img class="w-6 h-6" src="{{$icon}}">
    <span class="ml-3">{{$text}}</span>
</a>
