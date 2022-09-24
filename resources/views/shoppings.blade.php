<x-layout>
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">Shoppings of {{$customer->name}}</h1>



        <form method="GET" action="/create/shopping">
            @csrf

            <x-submit_button color="green-500">Create New Shopping</x-submit_button>
        </form>
        <form method="GET" action="/logout">
            @csrf

            <x-submit_button color="red-500">Log Out</x-submit_button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($shoppings->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>

                <th scope="col">Customer Name</th>
                <th scope="col">Item</th>
                <th scope="col">Amount</th>
                <th scope="col">Cost</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shoppings as $shopping)
                <x-shopping_table_element :shopping="$shopping"/>
            @endforeach


            </tbody>



        </table>
        <div class="d-flex justify-content-center">
            {!! $shoppings->links() !!}
        </div>
        @else
        <p>There is not any shopping.</p>
        @endif
    </div>
</x-layout>



