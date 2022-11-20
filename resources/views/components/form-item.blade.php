<label for="{{$id}}">{{$label}}</label>
<input name="{{$id}}" id="{{$id}}" type="{{$type}}">
@if($errors->has($id))
    <p>{{$errors->first($id)}}</p>
@endif
