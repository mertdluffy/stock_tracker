<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stock Tracking</title>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <header class="container d-flex justify-content-between">
        <h1 class="my-4">Stocks</h1>
        <form method="GET" action="/dashboard">

            <input value="{{request('search')}}" type="text" name="search" placeholder="Find item"
                   class="mt-4 bg-transparent placeholder-black font-semibold text-sm">
        </form>
        <form method="GET" action="/create">
            @csrf

            <button class="mb-4" style="margin:10px; height:50px; background-color: #ADFF2F;">Create New Item</button>
        </form>
        <form method="GET" action="/logout">
            @csrf

            <button class="mb-4 bg-primary" style="margin:10px; height:50px;">Log Out</button>
        </form>
    </header>
    <div class="container p-6 ">

        @if($items->count())
        <table class="table table-bordered bg-gray-100" >
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
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

    </body>
</html>
