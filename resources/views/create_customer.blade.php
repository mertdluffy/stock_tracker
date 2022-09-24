<x-layout>

    <div class="container py-8 max-w-4xl mx-auto border-gray-200 d-flex justify-content-between">

        <form method="POST" action="/create/customer" enctype="multipart/form-data">
            <h1 class="text-xl">Create New Customer</h1>
            @csrf
            <x-form_input name="name"/>

            <x-submit_button color="blue-500">Create</x-submit_button>
        </form>

        <form method="GET" action="/customers" enctype="multipart/form-data">
            @csrf

            <x-submit_button>Return to Customers</x-submit_button>
        </form>

    </div>

</x-layout>
