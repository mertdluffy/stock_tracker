@props(['item','mode'])

<tr>
    <th scope="row">{{$item->name}}</th>
    <td>{{$item->category->name}}</td>
    <td>{{$item->amount}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->price}} $</td>
    <td >
        <form method="GET" action="{{url(app()->getLocale().'/items/'. $item->id .'/edit')}} " class = "d-flex justify-content-center align-items-center">
            @csrf

            <x-edit_amount_form_input name="amount" width="75"/>
            <x-submit_button color="green-100">{{__('Add')}}</x-submit_button>
        </form>
    </td>
    <td >
        <form method="POST" action="{{url(app()->getLocale().'/items/'. $item->id )}}" class = "d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')
            <x-edit_amount_form_input name="amount" width="75"/>
            <x-submit_button color="red-100">{{__('Remove')}}</x-submit_button>
        </form>
    </td>
    <td>
        <form method="POST" action="{{url(app()->getLocale().'/items/'.$item->id)}}">
            @csrf
            @method('DELETE')

            <x-submit_button>{{__('Delete')}}</x-submit_button>
        </form>
    </td>
</tr>
