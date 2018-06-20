<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\Category;
use App\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        // $items = Item::first();
        $items = Item::first()->warehouse()->get(['qty']);
        dd($items);
        
        return view('items.index', ['items'=>$items],['qty'=>$qty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();
       $warehouses = Warehouse::all();
       return view('items.create',['categories'=>$categories],['warehouses'=>$warehouses]);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
         $item = Item::create($request->all());
         $item->warehouse()->attach($request->warehouse_id , ['qty' => $request->qty]);
         //dd($item);
         return redirect('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, $id)
    {
        $items = Item::find($id);
        return view('items.edit', ['item'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item,$id)
    {
        Item::find($id)->update($request->all());
        return redirect('item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Item::find($id);
       Item::find($id)->delete();
       $item->warehouse()->detach();               
       return redirect('item');
    }
}
