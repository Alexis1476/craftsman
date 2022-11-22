<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{$id}}">{{$label}}</label>
    <input
        class="@error($id) border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white "
        name="{{$id}}" id="{{$id}}" type="{{$type}}"
        value="{{isset($value) ? $value : old($id)}}">
    @if($errors->has($id))
        <p class="text-red-500 text-xs italic">{{$errors->first($id)}}</p>
    @endif
</div>
