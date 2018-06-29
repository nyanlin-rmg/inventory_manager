<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Item;
use App\Category;
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
        return redirect('warehouses')->with('success','Warehouse successfully created');
    }
    public function show($id)
    {
        $wid = $id;
        $warehouses = Warehouse::findOrFail($id);
        $items = Item::all();
        $items = $warehouses->items()->get();
        $categories = $items->map ( function ($value, $key) {
            return $value->category()->get();
        } )->unique(); 
        return view('warehouse.show',['wid'=>$wid], ['categories'=>$categories],['items'=>$items]);
    }

    public function showItems( $category_id, $warehouse_id)
    {
        $warehouses = Warehouse::findOrFail($warehouse_id);
        $items = $warehouses->items()->where('category_id',$category_id)->get();
        return view('warehouse.showItems', ['items'=>$items]);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }
    public function update(Request $request, $id)
    {
        Warehouse::find($id)->update($request->all());
        return redirect('warehouses')->with('success','Warehouse successfully updated');
    }
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        Warehouse::find($id)->delete();
        $warehouse->items()->detach();
        return redirect('warehouses/')->with('success','Warehouse successfully deleted');
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
    public function inventory_in(Request $request, $id)
    {
        $item = Item::find($id);
        $warehouses = $item->warehouses;
        foreach ($warehouses as $warehouse) {
            $qty = $warehouse->pivot->qty;
            $warehouse_id = $warehouse->pivot->warehouse_id;
        }
        $qty += $request->quantiy;
        $item->warehouses()->updateExistingPivot($warehouse_id, ['qty' => $qty]);
        return redirect()->back();
    }


    public function purchase() 
    {
        $items = Item::all();
        $warehouses = Warehouse::all();
        return view('warehouse.purchase', ['warehouses' => $warehouses, 'items' => $items]);
    }
    public function save(Request $request)
    {
        $item = Item::find($request->item_id);
        $warehouses = $item->warehouses()->get();
        $quantity = $request->quantity;
        $warehouse = $item->warehouses()->find($request->warehouse_id);
        if($warehouse == null) {
            $qty = 0;
        } else {
            $qty = $warehouse->pivot->qty;
        }
        $quantity = $qty + $quantity;
        $item->warehouses()->sync([$request->warehouse_id => ['qty'=>$quantity]]);
       return redirect('warehouses');

    }
}