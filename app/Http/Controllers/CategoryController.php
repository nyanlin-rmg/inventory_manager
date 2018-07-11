<?php

namespace App\Http\Controllers;
use App\Item;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
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
        //dd($request->photo);
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
            'image' => 'required',
        ]); 
        /*$fileName = "fileName".time().'.'.request()->image->getClientOriginalExtension();
        $request->image->storeAs('images',$fileName);*/

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            //dd($name);
            $destinationpath = public_path('/images');
            $imagePath = $destinationpath . "/" . $name;
            $image->move($destinationpath, $name);

            $save = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $name
            ]);
        }
        $save->save();
        Alert::success('Success', "Category created successfully");
        return redirect('/categories');
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
        Alert::success('Success', 'Successfully Updated!');
        return redirect('/categories');
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
        return response()->json([
            'message' => 'Deleted'
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ( ! trim( $search ) ) 
        {
            $categories = [];
            return view('categories.search_result', ['categories'=> collect($categories) , 'search'=>$search] );
        }

        $categories = Category::where('name','LIKE','%'.$search.'%')->get();
    
        return view('categories.search_result', ['categories'=>$categories, 'search'=>$search]);
        }   
}
