@if(count($projects) > 0)
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
                    @if(Auth::user()->companies_id == $project->companies_id)
                  <tr>
                 	  <td>{{++$i}}</td>
                  	 <td>{{$project->name}}</td> 
                  	 <td>{{$project->description}}</td>
                  	 <td>
                  		  <div class="progress progress-xs">
                      		  <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                        </div>
                        {{-- EDIT --}}
                      </td>
                     
                      <td>
                        {{-- <a href="{{ route('projects.edit',$project->id) }}"> --}}
                          {!!Form::submit('Edit',['class' => 'btn btn-warning','data-toggle'=>'modal', 'data-target'=> '#edit'])!!}
                        {{-- </a>  --}}
                      </td>
                      {{-- DELETE --}}
                      <td>
                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy',$project->id]]) !!} --}}
                            {!! Form::button('Delete', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-id' => $project->id,
                            'data-target'=> '#delete']) !!}
                        {{-- {!! Form::close() !!} --}}
                      </td>
                  </tr>
                  @endif
                @endforeach 
              </table>
            </div>
          </div>
        </div>
        @include('partials.modals.edit')
        @include('partials.modals.delete')
      @else
      {{"You don't have projects, create one!"}}
    @endif


