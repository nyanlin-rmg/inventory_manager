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
        $items = Item::with('warehouses')->get();
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
         $item = Item::create($request->all());
         $item->warehouses()->attach($request->warehouse_id , ['qty' => $request->qty]);
         //dd($item);
         return redirect('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $items = Item::with('warehouses')->find($id);
        return view('items.edit', ['item'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $item = Item::find($id)->update($request->all());
      //return redirect('item');
        $item = Item::find($id);
        Item::find($id)->update($request->all());
        $item->warehouses()->updateExistingPivot($request->warehouse_id , ['qty' => $request->qty]);

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
       $item->warehouses()->detach();               
       return redirect('item');

    }
    public function search(Request $request)
    {
        if ( ! trim( $request->search) ) 
        {
            $items = [];
            return view('items.search_result', ['items'=> collect($items)] );
        }
        $items = Item::with('warehouses')->where('name','LIKE','%'.$request->search.'%')->get();       
    
        return view('items.search_result', ['items'=>$items]);
        }   

}

