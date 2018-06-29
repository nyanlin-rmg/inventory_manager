<?php

namespace App\Http\Controllers;
use App\Item;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => 'required|alpha|max:255',
            'description' => 'required',
        ]);
        Category::create($request->all());
        //return redirect('/category')->with('success','Category created successfully');
        return redirect('/category')->with('success','Category created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        $items = $categories->items()->get();
        return view ('categories.show',['items'=>$items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',['category'=>$category]); 
    }

    /**
   with  * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        Category::find($id)->update($request->all());
        return redirect('/category')->with('success','Category updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        Category::find($id)->delete();
        $category->items()->delete();
        return redirect('/category')->with('success','Category deleted successfully!!');
    }

    public function search(Request $request)
    {
        if ( ! trim( $request->search) ) 
        {
            $categories = [];
            return view('categories.search_result', ['categories'=> collect($categories)] );
        }

        $categories = Category::where('name','LIKE','%'.$request->search.'%')->get();
    
        return view('categories.search_result', ['categories'=>$categories]);
        }   
}
