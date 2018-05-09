@push('styles')
    <link href="{{ asset('css/progressBar.css') }}" rel="stylesheet">
@endpush

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
                       
                      @foreach ($time as $t)
                        @if ($t->id == $task->time_id)    
                          <td>
                            <p>{{$task->time_id}}</p>
                            <p>{{$t->start}}</p>
                            <p>{{$t->finish}}</p>
                            @include('timer')
                          </td>
                        @endif 
                      @endforeach 

                      <td>
                          <div id="progressBar">
                              <div class="bar"></div>
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
