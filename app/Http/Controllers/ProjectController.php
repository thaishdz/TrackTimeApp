<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Project;
use App\Task;
use App\User;
use App\Companies;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();
        return view('TracktimeApp.projects', compact('projects','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.projects.createProject');
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
        ]);

        if (!$request->has('active')) {
            $request['active'] = 'OFF';
        }
        Project::create($request->all());

        return redirect()->route('projects.index')
                         ->with('success','Project created successfully');
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
        $project = Project::findOrFail($id);
        $company = Companies::all();
        return view('partials.projects.editProject',compact('project','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $request->validate([

            'name' => 'required|min:5|max:20',
            'description' => 'nullable|min:10|max:50',
        ]);
        
        if (!$request->has('active')) {
            $request['active'] = 'OFF';
        }

        Project::findOrFail($id)->update($request->all());

        \Session::flash('flash_message','PROJECT successfully updated.');

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = DB::table('tasks')->select('id')->where("projects_id", "=", $id)->get()->toArray();
            foreach($tasks as $task){   
                Task::destroy($task->id);  
            }
            
        Project::destroy($id);
        
        return redirect()->route('projects.index')
                         ->with('success','Project deleted succesfully!');
    }
}
