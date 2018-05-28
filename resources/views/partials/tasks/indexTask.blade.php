<div class="container">
  <div class="box">
    <?php $i= 0 ?>
      <div class="box-header with-border">
        <h3 class="box-title">Tasks Table</h3>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th >Task</th>
            <th>Description</th>
            <th>Status</th>
            <th class="col-md-2">Remaining Time</th>
            <th>Start_Date</th>
            <th>Finish_Date</th>
            <th>Timing</th>
            <th>Progress</th>
            <th>Project</th>
          </tr>
        </thead>
      <tbody>
          
        @include ('partials.messages.errors')
        @include ('partials.messages.flash-messages')

          @foreach($tasks as $task)
            @foreach($projects as $p)
            
                @if($p->id == $task->projects_id && $p->companies_id == Auth::user()->companies_id)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$task->name}}</td> 
                    <td>{{$task->description}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$task->estimated_minute}} min</td> 

                    @foreach ($time as $t)
                      @if ($t->id == $task->time_id) 
                        <td>{{$t->start}}</td>
                        <td>{{$t->finish}}</td>   
                        <td class="col-md-4">
                          @include('timer')
                        </td>
                      @endif 
                    @endforeach 

                    <td>
                        <div class="progressBar" id="{{$task->id}}">
                            <div class="bar" id="{{$task->id}}">0%</div>
                        </div>                          
                    </td>
                    <td>{{$p->name}}</td>

                  {{-- EDIT --}}
                    <td>
                    <a href="{{ route('tasks.edit',$task->id) }}">
                      <button type="submit" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </button>
                    </a>
                  </td>
                    {{-- DELETE --}}
                  <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy',$task->id],'style'=>'display:inline']) !!}
                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm','data-toggle'=>'confirmation'] )  }}
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

<script src="{{ asset('js/confirmation-delete.js') }}"></script>