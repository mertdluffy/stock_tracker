<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Validation\Rule;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $loc,Customer $customer)
    {
        return view('shoppings',[
            'shoppings' => $customer
                ->shoppings()->orderBy('created_at','desc')
                ->paginate(6),
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_shopping');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'item_id' => 'required',
            'amount' => 'required',
            'customer_id' => 'required',
        ]);
        if (Item::find($attributes['item_id'])->amount < $attributes['amount']){
            return redirect(app()->getLocale().'/customers');
        }

        $shopping = Shopping::create($attributes);

        //updates
        $shopping->update(['cost' => $shopping->item->price * $shopping->amount]);
        $item = $shopping->item;
        $item->update(['amount' => $item->amount-=$shopping->amount]);
        $customer = $shopping->customer;
        $customer->update(['debt' => $shopping->customer->debt += $shopping->cost]);

        return redirect(app()->getLocale().'/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopping $shopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $loc,Shopping $shopping, Customer $customer)
    {
        $shopping->item->update(['amount' => $shopping->item->amount += $shopping->amount]);
        $shopping->customer->update(['debt' => $shopping->customer->debt -= $shopping->cost]);

        $customer = $shopping->customer;
        $shopping->delete();
        return redirect(app()->getLocale()."/customer/$customer->id/shoppings");
    }
}
