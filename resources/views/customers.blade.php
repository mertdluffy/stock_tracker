<x-layout>
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">{{__('Customers')}}</h1>
        <form method="GET" action="/{{app()->getLocale()}}/">
            @csrf

            <x-submit_button color="green-500">{{__('Stocks')}}</x-submit_button>
        </form>
        <form method="GET" action="/{{app()->getLocale()}}/customers">
            <input value="{{request('search')}}" type="text" name="search" placeholder="{{__('Find Customer')}}"
                   class="p-2 mt-4 bg-transparent placeholder-black font-semibold text-sm border border-sky-500 rounded-full">
        </form>


        <form method="GET" action="/{{app()->getLocale()}}/customers/create">
            @csrf

            <x-submit_button color="green-500">{{__('Create New Customer')}}</x-submit_button>
        </form>
        <form method="GET" action="/{{app()->getLocale()}}/logout">
            @csrf

            <x-submit_button color="red-500">{{__('Log Out')}}</x-submit_button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($customers->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>

                <th scope="col">{{__('Name')}}</th>
                <th scope="col">{{__('Debt')}}</th>
                <th scope="col">{{__('Shoppings')}}</th>
                <th scope="col">{{__('Payments')}}</th>
                <th scope="col">{{__('Delete Customer')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <x-customer_table_element :customer="$customer"/>
            @endforeach


            </tbody>



        </table>
        <div class="d-flex justify-content-center">
            {!! $customers->links() !!}
        </div>
        @else
        <p>There is not any customer. Please create a customer.</p>
        @endif
    </div>
</x-layout>



