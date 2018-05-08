@extends('layouts.master')

@section('header')

		<div class="box-header with-border">
            <h2 class="box-title">Task Edit</h2>
        </div>

@endsection

@section('content')

    <div class="col-md-6">
        <div class="box box-primary">

            @include ('partials.messages.errors')

            {!! Form::model($task, [ 'route' => ['tasks.update', $task->id],'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('nameTask', 'Task Name') }}
                        {{ Form::text('name',null,['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('name', 'Task Description') }}
                        {{ Form::text('description',null,['class' => 'form-control'])}}
                    </div>  


                    <div class="form-group">
                        {{ Form::label('statusl', 'Task Status') }}
                        {{ Form::checkbox('active', 'ON',true)}}
                    </div>

                    <div class="form-group">
                        {!! Form::label('project', 'Choose the Project') !!}
                        <select id="projects_id" name="projects_id" class="form-control">
                          @foreach($projects as $project)
                            @if(Auth::user()->companies_id == $project->companies_id)
                              <option value="{{$project->id}}">{{$project->name}}</option>
                            @endif 
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      @include('test')
                    </div>

                    <div class="box-footer">
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
    </div>
@endsection