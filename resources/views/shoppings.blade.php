<x-layout>
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">{{__('Shoppings of')}} {{$customer->name}}</h1>



        <form method="GET" action="/{{app()->getLocale()}}/shoppings/create">
            @csrf

            <x-submit_button color="green-500">{{__('Create New Shopping')}}</x-submit_button>
        </form>
        <form method="GET" action="/{{app()->getLocale()}}/customers">
            @csrf

            <x-submit_button color="red-500">{{__('Return Back')}}</x-submit_button>
        </form>
        <form method="GET" action="/{{app()->getLocale()}}/logout">
            @csrf

            <x-submit_button color="red-500">{{__('Log Out')}}</x-submit_button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($shoppings->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>

                <th scope="col">{{__('Customer Name')}}</th>
                <th scope="col">{{__('Item')}}</th>
                <th scope="col">{{__('Amount')}}</th>
                <th scope="col">{{__('Cost')}}</th>
                <th scope="col">{{__('Date')}}</th>
                <th scope="col">{{__('Delete')}}</th>
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
        <p>{{__('There is not any shopping.')}}</p>
        @endif
    </div>
</x-layout>



