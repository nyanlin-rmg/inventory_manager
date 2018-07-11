<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Item;
use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::paginate(5);
        return view('warehouse.index', ['warehouses'=>$warehouses]);
    }
    public function create()
    {
    	return view('warehouse.create');
    }
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|unique:warehouses|max:255',
            'location' => 'required',
            'image' => 'required',
        ]);
        //image is a name from form
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            //dd($name);
            $destinationpath = public_path('/images');
            $imagePath = $destinationpath . "/" . $name;
            $image->move($destinationpath, $name);

            $save = Warehouse::create([
                'name' => $request->name,
                'location' => $request->location,
                'image' => $name
            ]);
        }
        $save->save();
        Alert::success('Success', 'Success');
        return redirect('warehouses');
    }
    public function show($id)
    {
        $wid = $id;
        $warehouses = Warehouse::findOrFail($id);
        $items = $warehouses->items()->get();
        $categories = $items->map ( function ($value, $key) {
            return $value->category()->get();
        } )->unique(); 
        return view('warehouse.show',['wid'=>$wid], ['categories'=>$categories]);
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
        Alert::success('Success', 'Successfully Updated!');
        return redirect('warehouses');
    }
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        Warehouse::find($id)->delete();
        $warehouse->items()->detach();
        return redirect('warehouses')->with('success','Warehouse successfully deleted');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if(!trim($search))
        {
            $search_warehouses = [];
            return view('warehouse.search_result', ['search_warehouses'=>collect($search_warehouses) , 'search' => $search]);
        }
        $search_warehouses = Warehouse::where(
            'name', 'LIKE', '%'. $search. '%'
        )->get();
        return view('warehouse.search_result', ['search_warehouses' => $search_warehouses, 'search' => $search]);
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
            $item->warehouses()->attach($request->warehouse_id, ['qty'=>$quantity]);
        } else {
            $qty = $warehouse->pivot->qty;
            $quantity = $qty + $quantity;
            $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$quantity]);
        }
        Alert::success('Success', 'Success');
       return redirect('warehouses');
    }
    public function sale()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.sale', ['warehouses' => $warehouses]);
    }
    public function sale_items($warehouse_id)
    {
        $warehouse = Warehouse::find($warehouse_id);
        $items = $warehouse->items;
        return view('warehouse.sale_items', ['items' => $items, 'warehouse' => $warehouse]);
    }
    public function sell_item(Request $request)
    {
        $item = Item::find($request->item_id);
        $warehouses = $item->warehouses()->get();
        $warehouse = $item->warehouses()->find($request->warehouse_id);
        $quantity = $request->quantity;
        $qty = $warehouse->pivot->qty;
        if($qty < $quantity) {
            Alert::warning('Warning', 'No sufficient quantity in this warehouse');
            return back();
        }
        else{
            $quantity = $qty - $quantity;
            $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$quantity]);
            Alert::success('Success', 'Items have sold');
            return redirect('warehouses');
        }
    }
}