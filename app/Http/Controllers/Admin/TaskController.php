<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\task;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        $pagename = 'Task';
        $data = task::all();
        return view('admin.task.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Add Task';
        return view('admin.task.create', compact('pagename'));
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
            'txttask_description' => 'required',
        ]);

        $tasks_data = new task([
            'task_description' => $request->get('txttask_description'),
        ]);

        $tasks_data->save();
        return redirect('admin\task')->with('Success', 'task saved successfully');
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
        $pagename = 'Update Task';
        $data = task::find($id);
        return view('admin.task.edit', compact('data', 'pagename'));
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
            'txttask_description' => 'required',
        ]);

        $tasks = task::find($id);
        $tasks->task_description = $request->get('txttask_description');

        $tasks->save();
        return redirect('admin\task')->with('Success', 'task updated successfully');
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
        $tasks = task::find($id);

        $tasks->delete();
        return redirect('admin\task')->with('Success', 'task deleted successfully');
    }
}
