@props([
'color' => 'grey-100'
])
<button class="my-4 border border-sky-500 rounded-full p-2 bg-{{$color}}" >{{$slot}}</button>
