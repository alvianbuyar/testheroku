<?php

namespace App\Http\Controllers\Admin;

use App\detail;
use App\Http\Controllers\Controller;
use App\purchaselog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
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

    public function index(Request $request)
    {
        //
        $pagename = 'Detail';
        $data = detail::all();

        return view('admin.detail.index', compact('data', 'pagename'));
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
        $pagename = 'Edit Detail Loan';
        $data = detail::find($id);
        return view('admin.detail.edit', compact('data', 'pagename'));
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
            'txttube_status' => 'required',
        ]);

        $data = detail::find($id);

        $data->tube_status = $request->get('txttube_status');
        $data->save();

        return redirect('admin\detail')->with('Success', 'Tube status updated successfully');
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
        $loan = detail::find($id);

        $loan->delete();
        return redirect('admin\detail')->with('Success', 'detail log deleted successfully');
    }

    public function search(Request $request)
    {
        $pagename = 'Edit Detail Loan';
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $query = detail::whereBetween('updated_at', [$fromDate, $toDate])
            ->get();

        return view('admin.detail.search', compact('query', 'pagename'));
    }
}
