<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\productcategories;
use App\addproduct;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProductController extends Controller
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
        $pagename = 'Data Produk';
        $data = addproduct::all();
        return view('admin.addproduct.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $categories_data = productcategories::all();
        $pagename = 'Add Product Form';

        return view('admin.addproduct.create', compact('pagename', 'categories_data'));
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
            'txtproduct_seriesnumber' => 'required',
            'txtproduct_name' => 'required',
            'txtid_categories' => 'required',
            // 'txtstock' => 'required',
            'product_image' => 'mimes:jpeg,png,jpg,svg | required',
            'txtproduct_price' => 'required',
            'txttube_price' => 'required',
        ]);

        $imgName = $request->product_image->getClientOriginalName() . '-' . time()
            . '-' . $request->product_image->extension();

        $request->product_image->move(public_path() . '/productImage', $imgName);

        $product_data = new addproduct([
            'product_seriesnumber' => $request->get('txtproduct_seriesnumber'),
            'product_name' => $request->get('txtproduct_name'),
            'id_categories' => $request->get('txtid_categories'),
            // 'stock' => $request->get('txtstock'),
            'stock' => 1,
            'product_image' => $imgName,
            'product_price' => $request->get('txtproduct_price'),
            'tube_price' => $request->get('txttube_price'),
            'trigger' => 1,
        ]);

        $product_data->save();
        alert()->success('Anda berhasil menambah data', 'Sukses');
        return redirect('admin\addproduct')->with('Success', 'data product saved successfully', compact('imgName'));
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
        $categories_data = productcategories::all();
        $pagename = 'Product Update';
        $data = addproduct::find($id);
        return view('admin.addproduct.edit', compact('data', 'pagename', 'categories_data'));
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
            'txtproduct_seriesnumber' => 'required',
            'txtproduct_name' => 'required',
            'txtid_categories' => 'required',
            'product_image' => 'mimes:jpeg,png,jpg,svg | required',
            'txtproduct_price' => 'required',
            'txttube_price' => 'required',
        ]);

        $product = addproduct::find($id);

        if ($request->product_image != '') {
            $path = public_path() . '/productImage/';

            if ($product->product_image != '' && $product->product_image != null) {
                $file_old = $path . $product->product_image;
                unlink($file_old);
            }
        }

        $imgName = $request->product_image->getClientOriginalName() . '-' . time()
            . '-' . $request->product_image->extension();

        $request->product_image->move(public_path() . '/productImage', $imgName);

        $product->product_seriesnumber = $request->get('txtproduct_seriesnumber');
        $product->product_name = $request->get('txtproduct_name');
        $product->id_categories = $request->get('txtid_categories');
        // $product->stock = $request->get('txtstock');
        $product->product_image = $imgName;
        $product->product_price = $request->get('txtproduct_price');
        $product->tube_price = $request->get('txttube_price');

        $product->save();
        alert()->success('Anda berhasil mengubah data', 'Sukses');
        return redirect('admin\addproduct')->with('Success', 'data product saved successfully');
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
        $product = addproduct::find($id);

        $file = public_path('/productImage/') . $product->product_image;
        if (file_exists($file)) {
            @unlink($file);
        }

        $product->delete();
        alert()->success('Anda berhasil menghapus data', 'Sukses');
        return redirect('admin\addproduct')->with('Success', 'category data deleted successfully');
    }
}
