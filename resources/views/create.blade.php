<x-layout>

    <div class="container py-8 max-w-4xl mx-auto border-gray-200 d-flex justify-content-between">

        <form method="POST" action="/create" enctype="multipart/form-data">
            <h1>Create New Item</h1>
            @csrf
            <x-form_input name="name"/>
            <x-form_input name="type"/>
            <div class="mb-6">
                <x-form_label name="Category"/>
                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                        >{{$category->name}}</option>
                    @endforeach


                </select>
                <x-form_error name="category_id"/>
            </div>


            <x-submit_button color="blue-500">Create</x-submit_button>
        </form>

        <form method="GET" action="/create/category">
            @csrf

            <x-submit_button color="green-200">Create New Category</x-submit_button>
        </form>

        <form method="GET" action="/" enctype="multipart/form-data">
            @csrf

            <x-submit_button>Return Home</x-submit_button>
        </form>

    </div>
</x-layout>
