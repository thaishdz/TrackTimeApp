<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Project;
use App\Time_Entries;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $projects = Project::all();
        $time = Time_Entries::all();


        return view('TracktimeApp.tasks',compact('tasks','projects','time'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('partials.tasks.createTask',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|min:5|max:20',
            'description' => 'nullable|min:10|max:50',
            'estimated_minute' => 'required|min:1',

        ]);

       Time_Entries::create([
            'start' => $request->start,
            'finish'  => $request->finish,
            'total' => null,
            'duration' => null,
       ]);

       $id_time = Time_Entries::all()->last();

       if ($request->has('status')) {
           Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'estimated_minute' => $request->estimated_minute,
            'status' => $request->status,
            'projects_id' => $request->projects_id,
            'time_id' => $id_time->id,
            ]);
       }else{
            Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'estimated_minute' => $request->estimated_minute,
            'status' => 'OFF',
            'projects_id' => $request->projects_id,
            'time_id' => $id_time->id,
            ]);
       }
       \Session::flash('flash_message','TASK successfully added.'); //<--FLASH MESSAGE

        return redirect()->route('tasks.index');
                       // ->with('success','Task created sucessfully!');


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
        $projects = Project::all();
        $task = Task::findOrFail($id);
        return view('partials.tasks.editTask',compact('projects','task'));
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
        $request->validate([

            'name' => 'required|min:5|max:20',
            'description' => 'nullable|min:10|max:50',
        ]);

        if (!$request->has('status')) {
            $request['status'] = 'OFF';
        }

        Task::findOrFail($id)->update($request->all());


        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        \Session::flash('flash_message','TASK successfully removed.'); //<--FLASH MESSAGE
        return redirect()->route('tasks.index');
    }
}
