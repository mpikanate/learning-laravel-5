@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-heading"><h3>Tasks List</h3></div>

                <div class="panel-body">
                <!--    You are logged in!
                    {{ Auth::user()->status_user }}
                    {{ Auth::user()->id }} -->
                 
                        <h4> Status Type : User </h4>
                         <h4>Your id : {{ Auth::user()->id }}</h4>
                         <h4> Welcome! {{ Auth::user()->name }} </h4>
                         <hr/>
                   <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                             <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                            <li><a href="/home/active/{{ Auth::user()->id }}" method="post">Active</a></li>
                                            <li><a href="/home/passive/{{ Auth::user()->id }}" method="post">Passive</a></li>
                                     </ul>
                    </div>

                        @if($statusmsg == 'active')   
                    <table class="table table-striped task-table" width="500">

                    <!-- Table Headings -->
                        <thead>
                            <th>Title</th>
                          <th>Status</th>
                           <th>Last Modified</th>
                          
                          </thead>
                          <!-- Table Body -->
                         <tbody>
                            @foreach($actives as $active)
                             <tr>
                                
                                    
                                <td>
                                   {{ $tasks->find($active->task_id)->title }}
                                </td>
                                <td>
                                    <h4><span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   {{ $active->status }}</span> </h4>
                                </td>
                                <td>
                                      {{ $active->updated_at }}
                                </td>
                            </tr>
                        
                            
                             @endforeach
                         </tbody>
                    </table>
                    @else
                            <table class="table table-striped task-table" width="500">

                    <!-- Table Headings -->
                        <thead>
                            <th>Title</th>
                          <th>Status</th>
                           <th>Last Modified</th>
                          
                          </thead>
                          <!-- Table Body -->
                         <tbody>
                            @foreach($actives as $active)
                             <tr>
                                
                                    
                                <td>
                                   {{ $tasks->find($active->task_id)->title }}
                                </td>
                                <td>
                                     <h4><span class="label label-default"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>   {{ $active->status }}</span> </h4>
                                </td>
                                <td>
                                      {{ $active->updated_at }}
                                </td>
                            </tr>
                        
                            
                             @endforeach
                         </tbody>
                    </table>

                    @endif
                     
                            </ul>








                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
