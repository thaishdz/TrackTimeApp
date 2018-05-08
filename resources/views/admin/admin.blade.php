@extends('layouts.master')

@section('content')
	<div class="container">
	  <div class="table-responsive">
	    <div class="box">
	      <?php $i= 0 ?>
	        <table class="table table-striped">
	          <thead>
	            <tr>
	              <th style="width: 10px">#</th>
	              <th>Name</th>
	              <th>Email</th>
	              <th>Username</th>
	              <th>Active</th>
	              <th>Company Name</th>
	            </tr>
	          </thead>
	          	<tbody>
	            	@foreach($users as $user)
	            		<tr>
			              	<td>{{++$i}}</td>
			              	<td>{{$user->name}}</td>
			              	<td>{{$user->email}}</td>
			              	<td>{{$user->username}}</td>
			              	<td>{{$user->active}}</td>
			              	@foreach ($companies as $company)
				              	@if ($company->id == $user->companies_id)
				              		<td>{{$company->name}}</td>
				              	@endif
				            @endforeach
			                {{-- EDIT --}}
			                <td>
			                    <a href="{{ route('admin.edit',$user->id) }}">
			                        <button type="submit" class="btn btn-warning">
			                          <i class="fa fa-pencil" aria-hidden="true"></i>
			                        </button>
                      			</a>
			                </td>
			                {{-- DELETE --}}
			                <td>
			                    {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy',$user->id]]) !!}
			                      {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
			                    {!! Form::close() !!}
			                </td>
	                  	</tr>
	          		@endforeach
	        	</tbody>
	      	</table>
	  		</div>
		</div>
	</div>
@endsection