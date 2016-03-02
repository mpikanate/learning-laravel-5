@extends('layouts.app')
    
@section('content')


 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-heading"><h3>{{$tasks->title}}</h3></div>

                <div class="panel-body">
                   <task>
                        <h4>{{$tasks->body}}</h4>
                   </task>

                   <hr/>

                   <table class="table table-striped task-table">

                    <!-- Table Headings -->
                        <thead>
                            <th>Name</th>
                          <th>Status</th>
                          <th></th>
                          </thead>
                          
                    <!-- Table Body -->
                         <tbody>
                            @foreach ($usertasks as $usertask)
                             <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                  <!-- การ query -->
                                    <div><!--{{ $usertask->id }} :--> {{ $usertask->user->name }}
    
                        


                                     </div>
                                </td>
                                <td>
                                    <div>{{ $usertask->status }}</div>
                                </td>
                                <td>
                                        
                                        @if($usertask->status == 'active')
                                         
                                            
                                            <h4><span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Actived</span> </h4>
                                            
                                        @else
                                          <form action="{{ url('home/check/'.$usertask->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button  class="btn btn-primary">
                                              <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>  Sign</button>

                                            </form>
                                        @endif
                                        
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
                </div>


                <div class="panel-footer">
                    <div class="form-group">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection