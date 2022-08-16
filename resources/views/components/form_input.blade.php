@props(['name','type' => 'text'])


<div class="my-3">
    <x-form_label name="{{$name}}" />
    <input class="border border-gray-400 p-2 w-full rounded"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"

        {{$attributes (['value' => old($name)])}}
    >
    <x-form_error name="{{$name}}" />
</div>
