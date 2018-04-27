@extends('layouts.master')

@section('header')

  <div class="box-header with-border">
      <h3 class="box-title">Create Task</h3>
  </div>

@endsection

@section('content')
<div class="col-md-6">
      <div class="box box-primary">
            
            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif


            {{ Form::open(array('route' => 'tasks.store','method'=>'POST')) }}
                <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('nameTask', 'Task Name') }}
                      {{ Form::text('name',null,['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('name', 'Task Description ') }}
                      {{ Form::text('description',null,['class' => 'form-control'])}}
                    </div>  

                    <div class="form-group">
                      {{ Form::label('estimated_minutel', 'Time Estimated') }}
                      {{ Form::text('estimated_minute',null,['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                      {{ Form::label('statusl', 'Task Status') }}
                      {{ Form::checkbox('status', 'ON',true)}}
                    </div>

                    {{-- project  --}}
                    <div class="form-group">
                        {!! Form::label('project', 'Choose the Project') !!}
                        {{-- {!! Form::select('projects_id', $projects->pluck('name', 'id'),null,['class' => 'form-control']) !!} --}}
                        <select id="projects_id" name="projects_id" class="form-control">
                          {{-- <option value="null">-- SELECT OPTION --</option> --}}
                          @foreach($projects as $project)
                            @if(Auth::user()->companies_id == $project->companies_id)
                              <option value="{{$project->id}}">{{$project->name}}</option>
                            @endif 
                          @endforeach
                        </select>
                    </div>
                    {{-- time --}}
                    <div class="form-group">
                      @include('test')
                    </div>
                    <div class="box-footer">
                      {{Form::submit('Create Task',['class' => 'btn btn-success'])}}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
    </div>
@endsection
