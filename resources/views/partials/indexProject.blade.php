<div class="col-md-6">
        <div class="box">

            <div class="box-header with-border">
              <h3 class="box-title">Projects Table</h3>
            </div>
            <?php $i= 0 ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Project</th>
    			        <th>Description</th>
    			        <th>Progress</th>
                </tr>
                @foreach($projects as $project)
                <tr>
                 	<td>{{++$i}}</td>
                  	<td>{{$project->name}}</td> 
                  	<td>{{$project->description}}</td> 
                  	<td>
                  		<div class="progress progress-xs">
                      		<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                      </div>
                      {{-- EDIT --}}
                    <td>
                      <a href="{{ route('projects.edit',$project->id) }}">
                        {!!Form::submit('Edit',['class' => 'btn btn-warning'])!!}
                      </a>
                    </td>
                    {{-- DELETE --}}
                    <td>
                      {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy',$project->id]]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
      </div>
    </div>
</div>