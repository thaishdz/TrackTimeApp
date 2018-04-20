<div class="col-md-6">
        <div class="box">


            <div class="box-header with-border">
              <h3 class="box-title">Tasks Table</h3>
            </div>
            <?php $i= 0 ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
    			        <th>Description</th>
    			        <th>Progress</th>
                </tr>
                @foreach($tasks as $task)
                <tr>
                 	<td>{{++$i}}</td>
                  	<td>{{$task->name}}</td> 
                  	<td>{{$task->description}}</td> 
                  	<td>
                  		<div class="progress progress-xs">
                      		<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                      </div>
                      {{-- EDIT --}}
                    <td>
                      <a href="{{ route('tasks.edit',$task->id) }}">
                        {!!Form::submit('Edit',['class' => 'btn btn-warning'])!!}
                      </a>
                    </td>
                    {{-- DELETE --}}
                    <td>
                      {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy',$task->id]]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
      </div>
    </div>
</div>