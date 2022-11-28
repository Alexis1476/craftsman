<div class="bg-white rounded-[35px] shadow-lg flex mb-6 overflow-hidden">
    <img width="130" src="{{asset("img/activities/$category->image")}}" alt="Categorie" class="rounded-t-lg">
    <div class="p-6">
        <h2 class="font-bold mb-2 text-2xl text-[#371877]">{{$category->name}}
        </h2>
        <a href="{{route('category',['id'=>$category])}}"
           class="text-[#371877] hover:text-purple-500 underline text-sm">Voir les activités</a>
    </div>
</div>
{{--<div class="flex flex-col justify-center">
    <img width="130" src="{{asset("img/activities/$category->image")}}" alt="{{$category->name}}">
    <a class="font-bold text-xl mb-2" href="{{route('category',['id'=>$category])}}">{{$category->name}}</a>
</div>--}}
{{--<p>{{$category->description}}</p>--}}
