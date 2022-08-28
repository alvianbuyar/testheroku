<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\productcategories;

class ProductCategoriesController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('productcategories')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'categories_name' => 'required',
        ]);

        $data = new productcategories();
        $data->id = $request->id;
        $data->categories_name = $request->categories_name;
        $data->save();

        return response()->json($data, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'categories_name' => 'required',
        ]);

        $data = new productcategories();
        $data->id = $request->id;
        $data->categories_name = $request->categories_name;
        $data->save();

        return response()->json($data, 201);
    }

    public function destroy(Request $request)
    {
        $data = productcategories::where('id', '=', $request->id)->first();

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
