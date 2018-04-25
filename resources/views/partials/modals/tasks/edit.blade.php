<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Task {{$task->name}}</h4>
      </div>
              @include('partials.messages.errors')
              {!! Form::model($task, [ 'route' => ['tasks.update', $task->id],'method' => 'PUT']) !!}

                <div class="modal-body">
                  @include('partials.modals.tasks.form')
                </div>
              
              <div class="modal-footer">
                {{Form::submit('Save changes',['class' => 'btn btn-primary'])}}
              </div>
            </div>
          </div>
        {{ Form::close() }}
</div>