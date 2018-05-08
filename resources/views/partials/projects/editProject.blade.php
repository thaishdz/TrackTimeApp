@extends('layouts.master')

@section('header')

		<div class="box-header with-border">
            <h2 class="box-title">Edit Project</h2>
        </div>

@endsection

@section('content')

<div class="col-md-6">
    <div class="box box-primary">

        @include ('partials.messages.errors')

        {!! Form::model($project, [ 'route' => ['projects.update', $project->id],'method' => 'PUT']) !!}
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('nameProject', 'Name Project') }}
                    {{ Form::text('name',null,['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('name', 'Description Project') }}
                    {{ Form::text('description',null,['class' => 'form-control'])}}
                </div>  

                <div class="form-group">
                    {{ Form::label('statusl', 'Project Status') }}
                    {{ Form::checkbox('active', 'ON',true)}}
                </div>

                <div class="form-group">
                    @foreach ($company as $c)
                        @if(Auth::user()->companies_id == $c->id)
                            {{ Form::hidden('companies_id',$c->id,['class' => 'form-control'])}}
                        @endif
                    @endforeach
                </div>    

                <div class="box-footer">
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                </div>
            </div>    
        {{ Form::close() }}
        </div>
    </div>
@endsection