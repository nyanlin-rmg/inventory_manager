<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\Item;
use App\Category;
use App\History;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = count(Warehouse::all());
        $categories = count(Category::all());
        $items = count(Item::all());
        return view('index',['warehouses'=>$warehouses, 'categories'=>$categories, 'items'=>$items]);
    }
    public function about()
    {
        return view('about');
    }
    public function testvue()
    {
        return view('testvue');
    }
}
