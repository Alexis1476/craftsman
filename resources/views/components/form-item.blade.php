<label for="{{$id}}">{{$label}}</label>
<input name="{{$id}}" id="{{$id}}" type="{{$type}}" value="{{old($id)}}">
@if($errors->has($id))
    <p>{{$errors->first($id)}}</p>
@endif
