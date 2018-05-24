@extends('layouts.master')

@section('header')


@endsection

@section('content')
  @include ('partials.messages.errors')
  @include ('partials.messages.flash-messages')
  	<div class="col-md-6">
      	<div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>
              </div>

              {!!Form::open(['method' => 'POST', 'action'=> ['UserController@updateProfile', Auth::user()->id]])!!}
                {{ csrf_field() }}
                <div class="box-body">
                  
                  <div class="form-group">
                    <label for="namel">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                  </div>

                  <div class="form-group">
                    <label for="emailL">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                  </div>

                  <div class="form-group">
                    <label for="usernamel">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                  </div>

                  <div class="form-group">
                    <label for="passwordl">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="*******">
                  </div>

                  <div class="form-group">
                    <label for="confirmpasswordl">Password Confirm</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                 </div>
                 
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              {!!Form::close()!!}
          </div>
      </div>
    @include('TracktimeApp.profile_companies')
@endsection

