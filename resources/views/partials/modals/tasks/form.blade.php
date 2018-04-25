<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
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
