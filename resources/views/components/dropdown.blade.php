@props(['trigger'])

<div x-data="{ show: false }" @click.away="show=false" class="relative">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="border border-sky-500 py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52"
         style="display:none">
        {{$slot}}

    </div>
</div>
