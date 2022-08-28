<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\detail;
use App\addproduct;
use App\purchaselog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('details')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function destroy(Request $request)
    {
        $detail = detail::where('id', '=', $request->id)->first();

        $purchase = purchaselog::where('id', $detail->id_purchaselogs)->first();
        $purchase->purchase_total = $purchase->purchase_total - $detail->total_detail;
        $purchase->update();

        $data = addproduct::where('id', $request->$detail->id_addproducts)->first();
        $data->trigger = 1;
        $data->update();

        if (!empty($detail)) {
            $detail->delete();

            return response()->json($data, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
