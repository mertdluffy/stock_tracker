<x-layout>

    <div class="container py-8 max-w-4xl mx-auto border-gray-200 d-flex justify-content-between">

        <form method="POST" action="/{{app()->getLocale()}}/customers" enctype="multipart/form-data">
            <h1 class="text-xl">{{__('Create New Customer')}}</h1>
            @csrf
            <x-form_input name="name"/>

            <x-submit_button color="blue-500">{{__('Create')}}</x-submit_button>
        </form>

        <form method="GET" action="/{{app()->getLocale()}}/customers" enctype="multipart/form-data">
            @csrf

            <x-submit_button>{{__('Return Back to Customers')}}</x-submit_button>
        </form>

    </div>

</x-layout>
