@props(['shopping','mode'])

<tr>
    <th scope="row">{{$shopping->customer->name}}</th>
    <td>{{$shopping->item->name}}</td>
    <td>{{$shopping->amount}}</td>
    <td>{{$shopping->cost}} $</td>
    <td>
        {{$shopping->created_at}}
    </td>
    <td>
        <form method="POST" action="/shopping/{{$shopping->id}}">
            @csrf
            @method('DELETE')

            <x-submit_button>Delete</x-submit_button>
        </form>
    </td>
</tr>
