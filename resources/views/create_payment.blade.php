<x-layout>

    <div class="container py-8 max-w-4xl mx-auto border-gray-200 d-flex justify-content-between">

        <form method="POST" action="/{{app()->getLocale()}}/create/payment" enctype="multipart/form-data">
            <h1>{{__('Create New Payment')}}</h1>
            @csrf

            <div class="mb-6">
                <x-form_label name="customer"/>
                <select name="customer_id" id="customer_id">
                    @php
                        $customers = \App\Models\Customer::all();
                    @endphp

                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}"
                        >{{$customer->name}}</option>
                    @endforeach


                </select>
                <x-form_error name="customer_id"/>
            </div>

            <x-form_input name="cost"/>


            <x-submit_button color="blue-500">{{__('Create')}}</x-submit_button>
        </form>

        <form method="GET" action="/{{app()->getLocale()}}/customers" enctype="multipart/form-data">
            @csrf

            <x-submit_button>{{__('Return Back to Customers')}}</x-submit_button>
        </form>

    </div>
</x-layout>
