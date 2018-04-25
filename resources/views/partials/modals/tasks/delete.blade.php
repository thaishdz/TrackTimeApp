<div class="modal modal-danger fade" id="delete-{{$task->id}}">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Task {{$task->name}}</h4>
            </div>
            {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy',$task->id]])!!}
              <div class="modal-body">
                <strong>ARE YOU SURE YOU WANT DELETE {{$task->name}} ?</strong>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">NOOOOOOOOOO</button>
                <button type="submit" class="btn btn-warning">YES,DELETE IT</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
  <!-- /.modal-dialog -->
</div>
{!! Form::close() !!}
