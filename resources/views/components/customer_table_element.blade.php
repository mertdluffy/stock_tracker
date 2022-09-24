@props(['customer','mode'])

<tr>
    <th scope="row">{{$customer->name}}</th>
    <td>{{$customer->debt}} $</td>
    <td>
        <form method="POST" action="customer/{{$customer->id}}/shoppings" class="flex justify-evenly">
            @csrf
            <x-submit_button color="green-100">Shoppings</x-submit_button>
        </form>
    </td>
    <td>
        <form method="POST" action="customer/{{$customer->id}}/payments" class="flex justify-evenly">
            @csrf
            <x-submit_button color="green-100">Payments</x-submit_button>
        </form>
    </td>
    <td>
        <form method="POST" action="customer/{{$customer->id}}">
            @csrf
            @method('DELETE')

            <x-submit_button>Delete</x-submit_button>
        </form>
    </td>
</tr>
