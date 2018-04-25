@if(count($tasks) > 0)
<div class="container">
<div class="table-responsive">
  <div class="box">
    <?php $i= 0 ?>
      <table class="table table-striped">
        <thead>
          <tr>
          <th style="width: 10px">#</th>
          <th>Task</th>
          <th>Description</th>
          <th>Time</th>
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
                <td>
                      {{-- <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                      </div> --}}
                      {{-- <div id="pbar_innertext">0%</div> --> --}}
                  @include('timer')
                </td>    
                <td>{{$p->name}}</td>
                          
                {{-- EDIT --}}
                <td>
                      {{-- <a href="{{ route('tasks.edit',$task->id) }}">
                        {!!Form::submit('Edit',['class' => 'btn btn-warning'])!!}
                      </a> --}}
                {!!Form::submit('Edit',['class' => 'btn btn-warning','data-toggle'=>'modal', 'data-target'=> '#edit'])!!}
                </td>
                  {{-- DELETE --}}
                <td>
                {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy',$task->id]]) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </td>
              </tr>
          </tbody>
          @endif
        @endforeach
      @endforeach
    </table>
  </div>
</div>
</div>
      {{-- @include('partials.modals.tasks.edit') --}}
      {{-- @include('partials.modals.tasks.delete') --}}
  @else
    You don't have tasks!!
</div>
@endif
