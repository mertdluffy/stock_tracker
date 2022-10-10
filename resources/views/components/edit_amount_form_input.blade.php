@props(['name','type' => 'text','width' => '100'])


<div class="my-3 ">
    <div class = "d-flex justify-content-center align-items-center">
        <label for="{{$name}}" class="block mr-2 uppercase font-bold text-xs text-gray-700">
            {{ucwords(__($name))}}
        </label>
        <input class="border border-gray-400 p-2 w-full rounded w-{{$width}}"
               type="{{$type}}"
               name="{{$name}}"
               id="{{$name}}"

            {{$attributes (['value' => old($name)])}}
        >
    </div>
    <x-form_error name="{{$name}}"/>
</div>
