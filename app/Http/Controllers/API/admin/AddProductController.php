<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\addproduct;

class AddProductController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('addproducts')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'product_seriesnumber' => 'required',
            'product_name' => 'required',
            'id_categories' => 'required',
            'product_image' => 'mimes:jpeg,png,jpg,svg | required',
            'product_price' => 'required',
            'tube_price' => 'required',
            'trigger' => 'required',
        ]);

        $data = new addproduct();
        $data->id = $request->id;
        $data->product_seriesnumber = $request->product_seriesnumber;
        $data->id_categories = $request->id_categories;
        $data->product_image = $request->product_image;
        $data->product_price = $request->product_price;
        $data->tube_price = $request->tube_price;
        $data->trigger = $request->trigger;
        $data->save();

        return response()->json($data, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'product_seriesnumber' => 'required',
            'product_name' => 'required',
            'id_categories' => 'required',
            'product_image' => 'mimes:jpeg,png,jpg,svg | required',
            'product_price' => 'required',
            'tube_price' => 'required',
            'trigger' => 'required',
        ]);

        $data = addproduct::where('id', '=', $request->id)->first();
        $data->id = $request->id;
        $data->product_seriesnumber = $request->product_seriesnumber;
        $data->id_categories = $request->id_categories;
        $data->product_image = $request->product_image;
        $data->product_price = $request->product_price;
        $data->tube_price = $request->tube_price;
        $data->trigger = $request->trigger;
        $data->save();

        return response()->json($data, 201);
    }

    public function destroy(Request $request)
    {
        $data = addproduct::where('id', '=', $request->id)->first();

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
