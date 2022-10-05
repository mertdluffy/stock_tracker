@props(['shopping'])

<tr>
    <th scope="row">{{$shopping->customer->name}}</th>
    <td>{{$shopping->item->name}}</td>
    <td>{{$shopping->amount}}</td>
    <td>{{$shopping->cost}} $</td>
    <td>
        {{$shopping->created_at}}
    </td>
    <td>
        <form method="POST" action="/{{app()->getLocale()}}/shopping/{{$shopping->id}}">
            @csrf
            @method('DELETE')

            <x-submit_button>Delete</x-submit_button>
        </form>
    </td>
</tr>
