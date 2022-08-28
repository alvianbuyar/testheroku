<?php

namespace App\Http\Controllers;

use App\addproduct;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = addproduct::paginate(8);
        return view('home.home', compact('data'));
    }

    public function search()
    {
        $searchText = $_GET['query'];
        $data = addproduct::where('product_name', 'LIKE', '%' . $searchText . '%')->get();

        return view('home.search', compact('data', 'searchText'));
    }
}
