@props(['item','mode'])

<tr>
    <th scope="row">{{$item->name}}</th>
    <td>{{$item->category->name}}</td>
    <td>{{$item->amount}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->price}} $</td>
    <td>
        <form method="POST" action="/{{app()->getLocale()}}/{{$item->id}}/1" class="flex justify-evenly">
            @csrf

            <x-form_input name="amount" />
            <x-submit_button color="green-100">Add</x-submit_button>
        </form>
    </td>
    <td>
        <form method="POST" action="/{{app()->getLocale()}}/{{$item->id}}/0" class="flex justify-evenly">
            @csrf

            <x-form_input name="amount" />
            <x-submit_button color="red-100">Remove</x-submit_button>
        </form>
    </td>
    <td>
        <form method="POST" action="/{{app()->getLocale()}}/{{$item->id}}">
            @csrf
            @method('DELETE')

            <x-submit_button>Delete</x-submit_button>
        </form>
    </td>
</tr>
