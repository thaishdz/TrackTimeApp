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
                      {{ Form::hidden('active',1,['class' => 'form-control'])}}
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