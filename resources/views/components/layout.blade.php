<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stock Tracking</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])

</head>
<body class="antialiased">

{{$slot}}
<div class="container d-flex justify-content-start align-items-center">
    <p class="mx-2">Change Language :</p>

    @if(app()->getLocale() == "tr")
        <form method="GET" action="/{{app()->getLocale()}}/localize/0" enctype="multipart/form-data">
            @csrf
            <x-submit_button color="green-100">En</x-submit_button>

        </form>
    @else
        <form method="GET" action="/{{app()->getLocale()}}/localize/1" enctype="multipart/form-data">
            @csrf
            <x-submit_button color="green-100">Tr</x-submit_button>

        </form>
    @endif
</div>

</body>
</html>
