@extends('layouts.master')

@section('header')

  @include('partials.messages.flash-messages')

	<div class="col-md-3 col-sm-6 col-xs-12">

        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">{{count($projects)}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
      </div>
    </div>
  
    

@endsection

@section('content')
  <a href="{{ route('projects.create') }}">
     <button type="submit" class="btn btn-info">
        <i class="fa fa-plus" aria-hidden="true"></i>
      </button>
  </a>

  @include('partials.projects.indexProject')

@endsection
