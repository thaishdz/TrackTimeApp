@extends('layouts.master')

@section('header')

  @include('partials.messages.flash-messages')

	<div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tasks</span>
              
              <span class="info-box-number">{{count($tasks)}}</span>

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
  <a href="{{ route('tasks.create') }}"><input class="btn" type="button" value="Create Task"></a>
  
  @include('partials.indexTask')

@endsection


