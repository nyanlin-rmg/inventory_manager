<?php

namespace App\Http\Controllers;
use App\Warehouse;
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
        Warehouse::create($request->all());
        return redirect('warehouse');
    }
    public function show(Request $request)
    {
    }
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
}
