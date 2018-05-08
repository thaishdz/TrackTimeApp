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
          <h3 class="box-title">Tasks Table</h3>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Task</th>
              <th>Description</th>
              <th>Time</th>
              <th>Status</th>
              <th>Timing</th>
              <th>Progress</th>
              <th>Project</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
              @foreach($projects as $p)
                  @if($p->id == $task->projects_id && $p->companies_id == Auth::user()->companies_id)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$task->name}}</td> 
                      <td>{{$task->description}}</td> 
                      <td>{{$task->estimated_minute}}</td>
                      <td>{{$task->status}}</td>
                      <td>@include('timer')</td>
                      <td>
                        <div class="progress progress-xs" id="blips">
                            <div class="progress-bar progress-bar-yellow" role="progressbar">
                              <span class="sr-only"></span>  
                            </div>
                        </div>                     
                      </td>    
                      <td>{{$p->name}}</td>

                    {{-- EDIT --}}
                      <td>
                      <a href="{{ route('tasks.edit',$task->id) }}">
                        <button type="submit" class="btn btn-warning">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                      </a>
                    </td>
                      {{-- DELETE --}}
                    <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy',$task->id]]) !!}
                      {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                    {!! Form::close() !!}
                    </td>
                  </tr>
                @endif
              @endforeach
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
