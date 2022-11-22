<a href="{{route('category',['id'=>$category])}}"><h2>{{$category->name}}</h2></a>
<img src="{{asset("img/activities/$category->image")}}" alt="{{$category->name}}">
{{--<p>{{$category->description}}</p>--}}
