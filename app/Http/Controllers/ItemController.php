<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Category;
use App\Item;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('category')->paginate(5);
        // $links = Item::
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
         $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required',
        ]);
         $item = Item::create($request->all());
         Alert::success('Success', "Item created successfully");
         return redirect('items');
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
        $category_id = $item->category_id;
        $selected_category = Category::find($category_id);
        $categories = Category::all();
        return view('items.edit', ['item' => $item, 'selected_category' => $selected_category, 'categories' => $categories]);

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
        Alert::success('Success', 'Successfully Updated!');
        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Item::find($id)->delete();      
       return redirect('items')->with('success','Item deleted successfully!!');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if(!trim($search))
        {
            $search_items = [];
            return view('items.search_result', ['search_items'=>collect($search_items) , 'search' => $search]);
        }    
        $search_items = Item::where(
            'name', 'LIKE', '%'. $search. '%'
        )->get();
        return view('items.search_result', ['search_items' => $search_items, 'search' => $search]);
    }
}

