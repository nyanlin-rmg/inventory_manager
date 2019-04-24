<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Item;
use App\Category;
use App\History;
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
        $request->validate([
            'name' => 'required|unique:warehouses|max:255',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:1000',
        ]);
        if($request->phone < 0) {
            Alert::warning('Warning', 'Phone number should be unsigned number!');
            return back();
        }
        $warehouse['name'] = $request->name;
        $warehouse['address'] = $request->address;
        $warehouse['phone'] = $request->phone;
        $file = $request->file('image');
        $warehouse['image'] = uniqid().'.'.$file->getClientOriginalName();
        $request->image->move(public_path('images'),$warehouse['image']);
        Warehouse::create($warehouse);
        Alert::success('Success', 'Warehouse created successfully');
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
        return view('warehouse.showItems', ['items'=>$items], ['warehouse_id'=>$warehouse_id]);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }
    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        if($request->phone < 0) {
            Alert::warning('Warning', 'Phone number should be unsigned number!');
            return back();
        }
        if($file != null) {
            $warehouse['name'] = $request->name;
            $warehouse['address'] = $request->address;
            $warehouse['phone'] = $request->phone;
            $warehouse['image'] = uniqid().'.'.$file->getClientOriginalName();
            $request->image->move(public_path('images'),$warehouse['image']);
            Warehouse::find($id)->update($warehouse);
        } else {
            $warehouse['name'] = $request->name;
            $warehouse['address'] = $request->address;
            $warehouse['phone'] = $request->phone;
            Warehouse::find($id)->update($warehouse);
        }
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

    public function purchase() 
    {
        $warehouses = Warehouse::all();
        return view('warehouse.purchase', ['warehouses' => $warehouses]);
    }

    public function purchase_item($warehouse_id)
    {
        $warehouse = Warehouse::find($warehouse_id);
        $items = Item::all();
        return view('warehouse.purchase_item', ['items' => $items, 'warehouse' => $warehouse]);
    }

    public function save(Request $request)
    {
        $item = Item::find($request->item_id);
        $warehouses = $item->warehouses()->get();
        $quantity = $request->quantity;
        $warehouse = $item->warehouses()->find($request->warehouse_id);

        if ($quantity <= 0) {
            Alert::warning('Warning', 'Something wrong with your input');
            return back();
        }
        if($warehouse == null) {
            $item->warehouses()->attach($request->warehouse_id, ['qty'=>$quantity]);
        } else {
            $qty = $warehouse->pivot->qty;
            $quantity = $qty + $quantity;
            $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$quantity]);
        }
        $history['warehouse'] = Warehouse::find($request->warehouse_id)->name;
         $history['item'] = $item->name;
         $history['qty'] = $quantity;
         $history['action'] = "Purchase";
         History::create($history);
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
        $item_id = $warehouse->pivot->item_id;
        $item_id = $warehouse->pivot->warehouse_id;
        
        if($qty < $quantity) {
            Alert::warning('Warning', 'No sufficient quantity in this warehouse');
            return back();
        }
        else if ($quantity < 0) {
            Alert::warning('Warning', 'Something wrong with your input');
            return back();
        }

        $history['warehouse'] = Warehouse::find($request->warehouse_id)->name;
        $history['item'] = $item->name;
        $history['qty'] = $quantity;
        $history['action'] = "Sale";
        History::create($history);

        $quantity = $qty - $quantity;
        
        if($quantity == 0) {
            $item->warehouses()->detach($request->warehouse_id, $request->item_id);
        }else {
            $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$quantity]);
        }


        Alert::success('Success', 'Items have been sold');
        return redirect('warehouses');
    }
    public function transfer()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.transfer', ['warehouses' => $warehouses]);
    }
    public function transfer_items($warehouse_id)
    {
        $warehouses = Warehouse::where('id','!=', $warehouse_id)->get();
        $warehouse = Warehouse::find($warehouse_id);
        $items = $warehouse->items;
        return view('warehouse.transfer_items', ['items' => $items, 'warehouses' => $warehouses, 'warehouse_id'=>$warehouse_id]);
    }
    public function transfer_save(Request $request)
    {
        $warehouse = Warehouse::find($request->warehouse);
        $item = Item::find($request->item);
        $warehouses = $item->warehouses()->find($request->warehouse);
        $origin_warehouse = $item->warehouses()->find($request->warehouse_id);
        $origin_qty = $origin_warehouse->pivot->qty;
        $quantity = $request->quantity;

        if($origin_qty < $quantity) {
            Alert::warning('Warning', 'No sufficient quantity in this warehouse');
            return back();
        }
        else if ($quantity < 0) {
            Alert::warning('Warning', 'Something wrong with your input');
            return back();
        }

        $origin_qty = $origin_qty - $quantity;

        if($origin_qty == 0) {
            $item->warehouses()->detach($request->warehouse_id, $request->item_id);
        } else {
            $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$origin_qty]);
        }

        // $item->warehouses()->updateExistingPivot($request->warehouse_id, ['qty'=>$origin_qty]);
         if($warehouses == null) {
             $item->warehouses()->attach($request->warehouse, ['qty'=>$quantity]);
         } else {
             $qty = $warehouses->pivot->qty;
             $quantity = $qty + $quantity;
             $item->warehouses()->updateExistingPivot($request->warehouse, ['qty'=>$quantity]);
         }
         Alert::success('Success', 'Success');
        return redirect('warehouses');
    }
    public function history()
    {
        $histories = History::orderBy('created_at', 'desc')->get();
        return view('warehouse.history', ['histories'=>$histories]);
    }
}