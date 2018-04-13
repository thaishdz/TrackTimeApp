@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/profile.css">
@stop

@section('content')


<h2>Edit Profile</h2>
<div class="form-group row">
	<div class="col-xs-3">
  		<form action="" method="POST">
  			<label for="lname">Name</label>
  				<input class="form-control" type="text" id="name" placeholder="name">

			<label for="">Password</label>
  				<input class="form-control" type="password" id="password">

			<label for="">Confirm Password</label>
  				<input class="form-control" type="text" id="c_password">

			<label for="">Email Address</label>
  				<input class="form-control" type="email" id="email">

			<label for="">Confirm Email</label>
				<input class="form-control" type="email" id="c_email">

	<h2>Company</h2>
		<label for="">Company Name</label>
			<input class="form-control" type="text" id="company_name">

		<label for="">Address</label>
			<input class="form-control" type="text" id="address">
  
		<input type="submit" value="Save Profile">
  
		</form>
  	</div>  
</div>



@endsection

