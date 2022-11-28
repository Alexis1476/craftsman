
<a href="{{$route}}"
   class="side-nav-item {{ request()->url() === $route ? 'font-bold flex flex-row block py-2 pl-3 pr-4 text-[#414994] rounded md:bg-transparent md:text-[#414994] md:p-0' : 'font-bold flex flex-row block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#414994] md:p-0'}}">
    <img class="w-6 h-6" src="{{$icon}}">
    <span class="ml-3">{{$text}}</span>
</a>
