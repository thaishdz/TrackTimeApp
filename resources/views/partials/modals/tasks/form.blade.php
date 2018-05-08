{{-- <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
{{ Form::label('nameL', 'Name Task') }}
{{ Form::text('name',null,['class' => 'form-control']) }}

{{ Form::label('descriptionL', 'Description Task') }}
{{ Form::text('description',null,['class' => 'form-control'])}}

{{ Form::hidden('active',1,['class' => 'form-control'])}}

<div class="form-group">
    {!! Form::label('project', 'Choose the Project') !!}
        <select id="projects_id" name="projects_id" class="form-control">
            @foreach($projects as $project)
                @if(Auth::user()->companies_id == $project->companies_id)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endif 
            @endforeach
        </select>
</div>
 --}}

 @if(isset($task))
    {!! Form::model($task,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header">
    <h5 class="modal-title">{{isset($task)?'Edit':'New'}} Task</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("name","Name",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),'placeholder'=>'Name','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("gender","Gender",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("gender",['Male'=>'Male','Female'=>'Female'],null,["class"=>"form-control"]) !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("email","Email",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
            <span id="error-email" class="invalid-feedback"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}