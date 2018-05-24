<div class="col-md-6">
    <div class="box box-primary">
       	<div class="box-header with-border">

			{!!Form::open(['method' => 'PUT', 'action'=> ['CompanyController@update', Auth::user()->companies_id]])!!}
		    {{ csrf_field() }}
				<h3>Company details</h3>        
				    <div class="form-group">
				      <label for="companyl">Company</label>
				      @foreach ($companies as $company)
				      	@if (Auth::user()->companies_id == $company->id)
				      		<input type="text" class="form-control" name="company" placeholder="Company Name" value="{{$company->name}}">
				      	
				    </div>
				   
				    <div class="form-group">
				      <label for="addressl">Address</label>
				      <input type="text" class="form-control" name="address" value="{{$company->address}}" >
					</div>

				<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
              	</div>
			@endif
		@endforeach
			{!! Form::close() !!}
		</div>
	</div>
</div>