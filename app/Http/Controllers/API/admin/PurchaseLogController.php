<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\purchaselog;

class PurchaseLogController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('purchaselogs')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function destroy(Request $request)
    {
        $data = purchaselog::where('id', '=', $request->id)->first();

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
