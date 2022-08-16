@props(['item','mode'])

<tr>
    <th scope="row">{{$item->id}}</th>
    <td>{{$item->name}}</td>
    <td>{{$item->amount}}</td>
    <td>{{$item->type}}</td>
    <td>
        <form method="POST" action="/{{$item->id}}/1">
            @csrf

            <x-form_input name="amount" />
            <button class="text-xs" style ="background-color: #ADFF2F;">Add</button>
        </form>
    </td>
    <td>
        <form method="POST" action="/{{$item->id}}/0">
            @csrf

            <x-form_input name="amount" />
            <button class="mx-6 text-xs" style ="background-color: #F08080">Remove</button>
        </form>
    </td>
    <td>
        <form method="POST" action="/{{$item->id}}">
            @csrf
            @method('DELETE')

            <button class="text-xs" style="border: solid;">Delete</button>
        </form>
    </td>
</tr>
