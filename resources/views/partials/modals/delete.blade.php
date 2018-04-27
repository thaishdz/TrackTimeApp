<div class="modal modal-danger fade" id="delete">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Delete Project {{$project->name}}</h4>
            </div>
            {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy',$project->id]])!!}
              <div class="modal-body">
                <strong>ARE YOU SURE YOU WANT DELETE {{$project->name}} THIS ACTION DELETE THE TASKS TOO</strong>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">NOOOOOOOOOO</button>
                <button type="submit" class="btn btn-warning">YES,DELETE IT</button>
              </div>
            </div>
          </div>
        {!! Form::close() !!}
</div>
