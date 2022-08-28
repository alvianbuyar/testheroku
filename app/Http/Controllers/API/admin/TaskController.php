<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //
    public function getAll()
    {
        $data = DB::table('tasks')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'task_description' => 'required',
        ]);

        $data = new task();
        $data->id = $request->id;
        $data->task_description = $request->task_description;
        $data->save();

        return response()->json($data, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'task_description' => 'required',
        ]);

        $data = task::where('id', '=', $request->id)->first();
        $data->id = $request->id;
        $data->task_description = $request->task_description;
        $data->save();

        return response()->json($data, 201);
    }

    public function destroy(Request $request)
    {
        $data = task::where('id', '=', $request->id)->first();

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
