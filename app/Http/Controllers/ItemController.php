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

        $items = Item::all();
        $items->warehouse()->attach($id,['qty'=>$qty]);   
        

        // $items = Item::select()
        //                 ->join('item_warehouses','id','=','item_warehouses.item_id')
        //                 ->get();
        $items = Item::get();

        return view('items.index', ['items'=>$items]);
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

        $item = Item::all();
        $item = Warehouse::make($item);
        $item->save();
        return redirect('item');
        //dd($_POST);
        // $item = new Item;
        // $item_warehouse = new Item_warehouse;
        // $item->name = $request->name;
        // $item->category_id = $request->cid;
        // $item->save();        
        // $item_warehouse->item_id = $item->id;
        // $item_warehouse->warehouse_id = $request->wid;
        // $item_warehouse->qty = $request->qty;
        // $item_warehouse->save();
        // return redirect('item');
         Item::create($request->all());
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
        // $items = Item::select()
        //                 ->join('item_warehouses','id','=','item_warehouses.item_id')
        //                 ->update($request->all());        
        // return redirect('item');
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
        $item->warehouse()->attach($id);

        $item->warehouse()->detach($id);
        
        
        Item::find($id)->delete();

        return redirect('item');
    }
}
