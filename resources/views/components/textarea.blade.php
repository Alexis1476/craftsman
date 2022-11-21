<label for="{{$id}}">{{$description}}</label>
<textarea name="{{$id}}" id="{{$id}}" cols="30" rows="10">{{isset($value) ? $value : old($id)}}</textarea>
@if($errors->has($id))
    <p>{{$errors->first($id)}}</p>
@endif
