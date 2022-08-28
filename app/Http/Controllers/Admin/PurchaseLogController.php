<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\purchaselog;
use Illuminate\Http\Request;

class PurchaseLogController extends Controller
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
        $pagename = 'Data Pemesan';
        // $data = purchaselog::all();
        $data = purchaselog::where('purchase_status', '!=', 0)->get();
        return view('admin.purchaselog.index', compact('data', 'pagename'));
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
        $pagename = 'Edit Proof';
        $data = purchaselog::find($id);
        return view('admin.purchaselog.edit', compact('data', 'pagename'));
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
            'txtproof' => 'required',
        ]);

        $data = purchaselog::find($id);

        $data->proof = $request->get('txtproof');
        $data->save();

        return redirect('admin\purchaselog')->with('Success', 'Tube status updated successfully');
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
        $purchase = purchaselog::find($id);

        $purchase->delete();
        return redirect('admin\purchaselog')->with('Success', 'log data deleted successfully');
    }
}
