<x-layout>
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">Payments of {{$customer->name}}</h1>



        <form method="GET" action="/create/payment">
            @csrf

            <x-submit_button color="green-500">Create New Payment</x-submit_button>
        </form>
        <form method="GET" action="/customers">
            @csrf

            <x-submit_button color="red-500">Return Back</x-submit_button>
        </form>
        <form method="GET" action="/logout">
            @csrf

            <x-submit_button color="red-500">Log Out</x-submit_button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($payments->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>

                <th scope="col">Customer Name</th>
                <th scope="col">Cost</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <x-payment_table_element :payment="$payment"/>
            @endforeach


            </tbody>



        </table>
        <div class="d-flex justify-content-center">
            {!! $payments->links() !!}
        </div>
        @else
        <p>There is not any payment.</p>
        @endif
    </div>
</x-layout>



