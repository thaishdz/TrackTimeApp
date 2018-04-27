@extends('layouts.master')

@section('header')

		<div class="box-header with-border">
            <h2 class="box-title">Task Edit</h2>
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
                        {{ Form::hidden('active',1,['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::hidden('companies_id',2,['class' => 'form-control'])}}
                    </div>

                    <div class="box-footer">
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
    </div>
@endsection