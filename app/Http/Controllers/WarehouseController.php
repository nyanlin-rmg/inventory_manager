<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Item;
use App\Category;
use App\Item_warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.index', ['warehouses'=>$warehouses]);
    }
    public function create()
    {
    	return view('warehouse.create');
    }
    public function store(Request $request)
    {
        $test = Warehouse::create($request->all());
        return redirect('warehouse');
    }
    public function show(Request $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $items = $warehouse->items()->get();
        $categories = $items->map ( function ($value, $key) {
            return $value->category()->get();
        } )->unique();
       
        return view('warehouse.show',['warehouse'=>$warehouse], ['categories'=>$categories]);
    }
    // public function showItems(Request $request, $id)
    // {
    //     $warehouse = Warehouse::findOrFail($id);
    //     $items = $warehouse->items()->get();
    //     $categories = Category::findOrFail($request->categoryid);
    //     dd($categories);
    //     foreach ($items as $item) {
    //         echo "$item->category_id";
    //     }
        
    // }

    public function edit(Warehouse $warehouse, $id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }
    public function update(Request $request, Warehouse $warehouse, $id)
    {
        Warehouse::find($id)->update($request->all());
        return redirect('warehouse');
    }
    public function destroy($id)
    {
        Warehouse::find($id)->delete();
        return redirect('warehouse/');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if(!trim($search))
        {
            $search_warehouses = [];
            return view('warehouse.search_result', ['search_warehouses'=>collect($search_warehouses)]);
        }
        $search_warehouses = Warehouse::where(
            'name', 'LIKE', '%'. $search. '%'
        )->get();
        return view('warehouse.search_result', ['search_warehouses' => $search_warehouses]);
    }
}