<div class="w-full md:w-1/2 px-3 mb-2 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{$id}}">{{$label}}</label>
    <input
        class="focus:outline-none focus:border-[#371877] focus:ring-1 focus:ring-[#371877] border-solid border-2 border-gray-400
        @error($id) border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3
        px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        name="{{$id}}" id="{{$id}}" type="{{$type}}"
        value="{{isset($value) ? $value : old($id)}}" placeholder="{{isset($placeholder) ? $placeholder : ''}}"
        required>
    @if($errors->has($id))
        <p class="text-red-500 text-xs italic">{{$errors->first($id)}}</p>
    @endif
</div>
