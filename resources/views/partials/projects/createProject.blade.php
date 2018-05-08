@extends('layouts.master')

{{-- @push('styles')
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
@endpush --}}

@section('header')

  <div class="box-header with-border">
      <h3 class="box-title">Create Project</h3>
  </div>

@endsection

@section('content')
<div class="col-md-6">
      <div class="box box-primary">

        @include ('partials.messages.errors')

            {{ Form::open(array('route' => 'projects.store','method'=>'POST')) }}
                <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('nameProject', 'Name Project') }}
                      {{ Form::text('name',null,['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('name', 'Description Project') }}
                      {{ Form::text('description',null,['class' => 'form-control'])}}
                    </div>  

                    {{-- <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label> --}}

                    <div class="form-group">
                      {{ Form::label('statusl', 'Project Status') }}
                      {{ Form::checkbox('active', 'ON',true)}}
                    </div>

                    <div class="form-group">
                      {{ Form::hidden('companies_id',Auth::user()->companies_id,['class' => 'form-control'])}}
                    </div>

                    <div class="box-footer">
                      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
    </div>
  

@endsection