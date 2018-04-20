<div class="modal fade" id="create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Project {{$project->name}}</h4>
      </div>
              @include('partials.messages.errors')
              {!! Form::model($project, [ 'route' => ['projects.update', $project->id],'method' => 'PUT']) !!}

                <div class="modal-body">
                  @include('partials.form')
                </div>
              
              <div class="modal-footer">
                {{Form::submit('Save changes',['class' => 'btn btn-primary'])}}
              </div>
            </div>
          </div>
        {{ Form::close() }}
</div>