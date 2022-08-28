<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('details')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'tube_status' => 'required',
        ]);

        $data = detail::where('id', '=', $request->id)->first();
        $data->id = $request->id;
        $data->tube_status = $request->tube_status;
        $data->save();

        return response()->json($data, 201);
    }

    public function destroy(Request $request)
    {
        $data = detail::where('id', '=', $request->id)->first();

        if (!empty($data)) {
            $data->delete();

            return response()->json($data, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
