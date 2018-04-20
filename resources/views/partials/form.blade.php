<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
{{ Form::label('nameProject', 'Name Project') }}
{{ Form::text('name',null,['class' => 'form-control']) }}

{{ Form::label('name', 'Description Project') }}
{{ Form::text('description',null,['class' => 'form-control'])}}

{{ Form::hidden('active',1,['class' => 'form-control'])}}

{{ Form::hidden('companies_id',2,['class' => 'form-control'])}}
