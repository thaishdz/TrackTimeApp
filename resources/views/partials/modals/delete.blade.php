<div class="modal modal-danger fade" id="delete">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Delete Project {{$project->name}}</h4>
                  <p>{{$project->id}}</p>
            </div>
            
              <div class="modal-body">
                <strong>ARE YOU SURE YOU WANT DELETE {{$project->name}} THIS ACTION DELETE THE TASKS TOO</strong>
                <input type="hidden" id="delete_token"/>
                <input type="hidden" id="delete_id"/>

              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">NOOOOOOOOOO</button>
        <button type="submit" class="btn btn-warning">YES,DELETE IT</button>
      </div>
    </div>
  </div>
</div>

{{-- <div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

