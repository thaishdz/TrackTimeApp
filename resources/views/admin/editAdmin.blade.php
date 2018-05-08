@extends('layouts.master')

@section('header')

		<div class="box-header with-border">
            <h2 class="box-title">Edit User</h2>
        </div>

@endsection

@section('content')

    <div class="col-md-6">
        <div class="box box-primary">

            @include ('partials.messages.errors')
            @include('partials.messages.flash-messages')

            {!! Form::model($user, [ 'route' => ['admin.update', $user->id],'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('nameUser', 'User Name') }}
                        {{ Form::text('name',null,['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('emailL', 'User Email') }}
                        {{ Form::text('email',null,['class' => 'form-control'])}}
                    </div>  

                    <div class="form-group">
                        {{ Form::label('usernameL', 'Username') }}
                        {{ Form::text('username',null,['class' => 'form-control'])}}
                    </div>

                    <div class="box-footer">
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
    </div>
@endsection