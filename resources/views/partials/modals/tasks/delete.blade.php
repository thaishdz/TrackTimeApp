<div class="modal modal-danger fade" id="modalDelete">
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
                <input type="hidden" id="delete_token"/>
                <input type="hidden" id="delete_id"/>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">NOOOOOOOOOO</button>
                <button type="submit" class="btn btn-warning"
                        onclick="ajaxDelete('{{url('laravel-crud-search-sort-ajax-modal-form/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())">YES,DELETE IT
                </button>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
  <!-- /.modal-dialog -->
</div>
{!! Form::close() !!}
