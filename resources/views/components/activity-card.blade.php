<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md relative">
    <div class="flex">
        <img class="w-10 h-10 mb-2 text-gray-500" src="{{asset("img/categories/$imgCategory")}}"
             alt="Category">
        <a href="{{route('activity',['id' => $activity->id])}}">
            <h5 class="ml-4 mb-2 text-2xl font-semibold tracking-tight text-[#371877]">{{$activity->name}}</h5>
        </a>
    </div>
    <p class="mb-3 font-normal text-gray-700"><strong>Description : </strong>{!!$activity->description!!}</p>
    <p class="mb-3 font-normal text-gray-700"><strong>Laboratoire : </strong>{{$activity->laboratory}}</p>
    <p class="mb-3 font-normal text-gray-700"><strong>Points : </strong>{{$activity->points}}</p>
    @auth('webadmin')
        <a class="mx-auto bg-[#3A9D23] hover:opacity-75 text-white font-bold py-2 px-4 rounded-full absolute bottom-4 right-4"
           href="{{route('admin.validateActivity',['user' => $user->anonymousID, 'activity' => $activity->id])}}">Valider</a>
    @endauth
</div>
