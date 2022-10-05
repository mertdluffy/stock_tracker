@props(['payment'])

<tr>
    <th scope="row">{{$payment->customer->name}}</th>
    <td>{{$payment->cost}} $</td>
    <td>
        {{$payment->created_at}}
    </td>
    <td>
        <form method="POST" action="/{{app()->getLocale()}}/payment/{{$payment->id}}">
            @csrf
            @method('DELETE')

            <x-submit_button>{{__('Delete')}}</x-submit_button>
        </form>
    </td>
</tr>
