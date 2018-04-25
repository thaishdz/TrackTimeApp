@extends('layouts.master')

@section('header')

	Profile

@endsection

@section('content')
	<div class="col-md-6">
    	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile</h3>
            </div>

            <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="Email1" placeholder="Enter email" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="Email1" placeholder="Enter email" value="{{ Auth::user()->email }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="Password1" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password Confirm</label>
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
               </div>
               
                <div class="form-group">
                  <label for="companyl">Company</label>
                  <input type="text" class="form-control" id="company" placeholder="Name Company">
                </div>

                {{-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div> --}}
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
@endsection

