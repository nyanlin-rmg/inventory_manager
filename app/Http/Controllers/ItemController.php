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
         $item = Item::create($request->all());
         //$item->warehouses()->attach($request->warehouse_id , ['qty' => $request->qty]);
         //dd($item);
         return redirect('items')->with('success','Item created successfully!!');
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

        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);

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
        $item = Item::find($id)->update($request->all());

        return redirect('items')->with('success','Item updated successfully!!');
        /*$item = Item::find($id);
        Item::find($id)->update($request->all());
        $item->warehouses()->updateExistingPivot($request->warehouse_id , ['qty' => $request->qty]);
<<<<<<< HEAD
       return redirect('items');
=======
        return redirect('item');*/


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
       //$item = Item::find($id);
       Item::find($id)->delete();

       //$item->warehouses()->detach();               
       return redirect('items')->with('success','Category updated successfully!!');
=======
       Item::find($id)->delete();      
       return redirect('items')->with('success','Item deleted successfully!!');
>>>>>>> 60e3eb4de59994560cf98c5cec02f948378f6b9d
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if(!trim($search))
        {
            $search_items = [];
            return view('items.search_result', ['search_items'=>collect($search_items) , 'search' => $search]);
        }
<<<<<<< HEAD
        $items = Item::with('warehouses')->where('name','LIKE','%'.$request->search.'%')->get();       
    
        return view('items.search_result', ['items'=>$items]);

        }  

}

    


=======
        $search_items = Item::where(
            'name', 'LIKE', '%'. $search. '%'
        )->get();
        return view('items.search_result', ['search_items' => $search_items, 'search' => $search]);
    }   
}
>>>>>>> 60e3eb4de59994560cf98c5cec02f948378f6b9d
