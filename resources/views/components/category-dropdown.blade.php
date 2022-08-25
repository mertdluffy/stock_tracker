<x-dropdown>
    @php
        $categories = \App\Models\Category::all();
        $currentCategory = \App\Models\Category::firstWhere('slug',request('category'))
    @endphp
    <x-slot name="trigger">
        <button class="pl-2 py-2 mt-4 pg-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex border border-sky-500 rounded-full">
            {{isset($currentCategory) ? $currentCategory->name : "Categories"}}

            <x-down-arrow class="absolute pointer-events-none"   />
        </button>
    </x-slot>

    <x-dropdown-item href="/dashboard/?  {{http_build_query(request()->except('category'))}}">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/dashboard/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}"
        >{{$category->name}}
        </x-dropdown-item>

    @endforeach
</x-dropdown>
