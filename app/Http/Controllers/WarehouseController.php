<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
    	$warehouses = DB::table('warehouses')->get();
    	return view('warehouse.index', ['warehouses'=>$warehouses]);
    }
    public function create()
    {
    	return view('warehouse.create');
    }
    public function store(Request $request)
    {
    	DB::table('warehouses')->insert([
    		'name' => $request->name,
    		'location' => $request->location
    	]);
    	return redirect('warehouse/'); 
    }
    public function show(Request $request)
    {
    	return view('warehouse.show');
    }
    public function edit($id)
    {
        $warehouse = DB::table('warehouses')->where('id', $id)->first();
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }
    public function update(Request $request)
    {
        DB::table('warehouses')->where('id', $request->id)
        ->update(['name' => $request->name, 'location' => $request->location]);
        return redirect('warehouse/');
    }
    public function destroy($id)
    {
        DB::table('warehouse')->where('id',$id)->delete();
        return redirect('warehouse/');
    }
}
