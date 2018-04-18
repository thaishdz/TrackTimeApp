@extends('layouts.master')


@section('header')

	PROJECTS

@endsection

@section('content')
<a href="{{ route('projects.create') }}"><input class="btn" type="button" value="Create Project"></a>

 	<div class="col-md-3 col-sm-6 col-xs-12">

        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">2</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
    	</div>
    </div>

@include('partials.indexProject')

@endsection