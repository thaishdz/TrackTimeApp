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

        return view('TracktimeApp.tasks',compact('tasks','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$company_user = DB::table('companies')
        ->join('users','users.companies_id', '=','companies.id')
        ->select('companies.id')
        ->get()->toArray();*/
        $projects = Project::all();

        return view('partials.createTask',compact('projects'));
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

       // dd($request);
       Time_Entries::create([
            'start' => $request->test,
            'stop'  => $request->test1,
            'duration' => null,
            'in_progress' => null,
       ]);

       /*$id_time = Time_Entries::all()->;
       foreach ($id_time as $id) {
           
       }*/
       Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'estimated_minute' => $request->estimated_minute,
            'active' => $request->active,
            'projects_id' => $request->projects_id,
            'time_id' => ,
       ]);
        //Task::create($request->all());
       

        return redirect()->route('tasks.index')
                        ->with('success','Task created sucessfully!');
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
        $tasks = Task::findOrFail($id);
        return view('partials.modals.tasks.form',compact('projects','tasks'));
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
        return redirect()->route('tasks.index')
                         ->with('success','Task deleted succesfully!');
    }
}
