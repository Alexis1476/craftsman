<div>
    <img src="{{asset("img/activities/$category->image")}}" alt="{{$category->name}}">
    <a class="font-bold text-xl mb-2" href="{{route('category',['id'=>$category])}}">{{$category->name}}</a>
</div>
{{--<p>{{$category->description}}</p>--}}
