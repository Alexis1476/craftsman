<a href="{{$route}}"
   class="nav-item {{ request()->url() === $route ? 'block py-2 pl-3 pr-4 text-[#414994] font-bold rounded md:bg-transparent md:text-[#414994] md:p-0' : 'font-bold block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#414994] md:p-0'}}">{{$text}}</a>
