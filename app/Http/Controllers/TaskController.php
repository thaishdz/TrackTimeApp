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
            'start' => 'required|date|after_or_equal:date',
            'finish' => 'required|date|after:start'

        ]);

        /*calcule estimated_minute*/

        $start = date_create($request->start);
        $finish  = date_create($request->finish);

        $diff = date_diff($start, $finish);

        $duration = ($diff->h * 60) + $diff->i;

        /***************************/

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
            'estimated_minute' => $duration,
            'status' => $request->status,
            'projects_id' => $request->projects_id,
            'time_id' => $id_time->id,
            ]);
       }else{
            Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'estimated_minute' => $intervalo->format('%i'),
            'status' => 'OFF',
            'projects_id' => $request->projects_id,
            'time_id' => $id_time->id,
            ]);
       }

       \Session::flash('flash_message','TASK successfully added.'); //<--FLASH MESSAGE

        return redirect()->route('tasks.index');

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
        $time_entries = Time_Entries::findOrFail($id);
        return view('partials.tasks.editTask',compact('projects','task','time_entries'));
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
            'start' => 'required|date|after_or_equal:date',
            'finish' => 'required|date|after:start'
        ]);

        /*calcule estimated_minute*/

        $now = date_create();
        $finish  = date_create($request->finish);
        $start  = date_create($request->start);

        $diff = date_diff($now, $finish);
        $diff2 = date_diff($start, $finish);

        $duration = ($diff->h * 60) + $diff->i;

        /***************************/

        if (!$request->has('status')) {
            $request['status'] = 'OFF';
        }

        if ( $diff2->d > 0) {
            
            Task::findOrFail($id)->update($request->all());
        }else{
            $request['estimated_minute']= $duration; 
            Task::findOrFail($id)->update($request->all()); 
        }


        Time_Entries::findOrFail($id)->update([

            'start' => $request->start,
            'finish' => $request->finish,

        ]);

        \Session::flash('flash_message',$request->name . " " . 'SUCCESSFULLY UPDATED.'); //<--FLASH MESSAGE
        return redirect()->route('tasks.index');
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
        Time_Entries::destroy($id);
        
        \Session::flash('flash_message','TASK SUCCESSFULLY REMOVED.'); //<--FLASH MESSAGE
        return redirect()->route('tasks.index');
    }
}
