@include('partials.messages.flash-messages')
<script>
  $(function () {
  var timerId = 0;
  var ctr=0;
  var max=10;
  
  timerId = setInterval(function () {
    // interval function
    ctr++;
    $('#blips > .progress-bar').attr("style","width:" + ctr*max + "%");
    
    // max reached?
    if (ctr==max){
      clearInterval(timerId);
    }
    
  }, 500);


  $('.btn-default').click(function () {
    clearInterval(timerId);
  });

});
</script>
  <div class="container">
    <div class="table-responsive">
      <div class="box">
        <?php $i= 0 ?>
          <div class="box-header with-border">
            <h3 class="box-title">Projects Table</h3>
          </div>
            <table class="table table-striped">
              <tr>
                <th style="width: 10px">#</th>
                <th>Project</th>
  			        <th>Description</th>
                <th>Active</th>
                <th>Progress</th>
              </tr>
                @foreach($projects as $project)
                  @if(Auth::user()->companies_id == $project->companies_id)
                  <tr>
                 	  <td>{{++$i}}</td>
                  	 <td>{{$project->name}}</td> 
                  	 <td>{{$project->description}}</td>
                     <td>{{$project->active}}</td>
                  	 <td>
                  		  <div class="progress progress-xs" id="blips">
                      		  <div class="progress-bar progress-bar-yellow" role="progressbar">
                              <span class="sr-only"></span>  
                            </div>
                        </div>
                      </td>
                      {{-- EDIT --}}
                      <td>
                        <a href="{{ route('projects.edit',$project->id) }}">
                           <button type="submit" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </button>
                          {{-- {!!Form::submit('Edit',['class' => 'btn btn-warning','data-toggle'=>'modal', 'data-target'=> '#edit'])!!} --}}
                        </a> 

                      </td>
                      {{-- DELETE --}}
                      {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy',$project->id]]) !!}
                      <td>
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                      </td>
                      {!! Form::close() !!}
                      {{-- <td>
                        {!! Form::model($projects, ['method' => 'delete', 'route' => ['projects.destroy', $project->id], 'class' =>'form-inline form-delete']) !!}
                        {!! Form::hidden('id', $project->id) !!}
                        {!! Form::submit(trans('partials.modals.delete'), ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                        {!! Form::close() !!}
                      </td> --}}
                  </tr>
                @endif
              @endforeach 
          </table>
      </div>
    </div>
  </div>