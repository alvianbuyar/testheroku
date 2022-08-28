<?php

namespace App\Http\Controllers\Admin;

use App\addproduct;
use App\Http\Controllers\Controller;
use App\productcategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        //
        $pagename = 'Kategori Produk';
        $data = productcategories::all();
        return view('admin.productcategories.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Add Categories';
        return view('admin.productcategories.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'txtcategories_name' => 'required',
        ]);

        $categories_data = new productcategories([
            'categories_name' => $request->get('txtcategories_name'),
        ]);

        $categories_data->save();
        return redirect('admin\productcategories')->with('Success', 'category data saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pagename = 'Update Categories';
        $data = productcategories::find($id);
        return view('admin.productcategories.edit', compact('data', 'pagename'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'txtcategories_name' => 'required',
        ]);

        $categories = productcategories::find($id);
        $categories->categories_name = $request->get('txtcategories_name');

        $categories->save();
        return redirect('admin\productcategories')->with('Success', 'category data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categories = productcategories::find($id);

        $categories->delete();
        return redirect('admin\productcategories')->with('Success', 'category data deleted successfully');
    }
}
