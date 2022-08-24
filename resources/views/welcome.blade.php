<x-layout>
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">Stocks</h1>
        <form method="GET" action="/dashboard">
            @if(request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
            @endif
            <input value="{{request('search')}}" type="text" name="search" placeholder="Find item"
                   class="p-2 mt-4 bg-transparent placeholder-black font-semibold text-sm border border-sky-500 rounded-full">
        </form>

        <x-category-dropdown />

        <form method="GET" action="/create">
            @csrf

            <x-submit_button color="green-500">Create New Item</x-submit_button>
        </form>
        <form method="GET" action="/logout">
            @csrf

            <x-submit_button color="red-500">Log Out</x-submit_button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($items->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">Type</th>
                <th scope="col">Add Stock</th>
                <th scope="col">Remove Stock</th>
                <th scope="col">Delete Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <x-table_element :item="$item"/>
            @endforeach


            </tbody>



        </table>
        <div class="d-flex justify-content-center">
            {!! $items->links() !!}
        </div>
        @else
        <p>There is not any item. Please create an item.</p>
        @endif
    </div>
</x-layout>



