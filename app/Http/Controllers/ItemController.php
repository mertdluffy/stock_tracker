<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items',[
            'items' => Item::latest()
                ->filter(request(['search','category']))
                ->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_item');
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
            'name' => ['required', Rule::unique('items','name')],
            'type' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        Item::create($attributes);

        return redirect(url(app()->getLocale().'/items'))->with('success',__('Item "').$attributes['name'].__('" Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(string $loc,Request $request,Item $item)
    {
        request()->validate([
            'amount' => 'required|numeric',
        ]);
        $item->update(['amount' => $item->amount += (float)$request->amount]);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(string $loc,Request $request, Item $item)
    {
        request()->validate([
            'amount' => 'required|numeric',
        ]);
        $item->update(['amount' => $item->amount -= (float)$request->amount]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $loc,Item $item)
    {
        $name = $item->name;
        $item->delete();

        return back()->with('success','Item "'.$name.'" Deleted Successfully');


    }
}
