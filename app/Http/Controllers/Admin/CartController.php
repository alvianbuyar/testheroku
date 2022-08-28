<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\detail;
use App\addproduct;
use App\purchaselog;
use Illuminate\Http\Request;

class CartController extends Controller
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
        // $pagename = 'Cart';
        // $data = purchaselog::where('purchase_status', '=', 0)->get();
        // return view('admin.cart.index', compact('data', 'pagename'));

        $pagename = 'Keranjang';
        $data = detail::all();
        return view('admin.cart.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $detail = detail::where('id', $id)->first();

        $purchase = purchaselog::where('id', $detail->id_purchaselogs)->first();
        $purchase->purchase_total = $purchase->purchase_total - $detail->total_detail;
        $purchase->update();

        $data = addproduct::where('id', $detail->id_addproducts)->first();
        $data->trigger = 1;
        $data->update();

        $detail->delete();

        return redirect('admin\cart')->with('Success', 'log data deleted successfully');
    }
}
