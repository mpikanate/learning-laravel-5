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
                    @if (Auth::user()->status_user == 'admin')
                        <h4> Status Type : Admin </h4>


                        <hr/>
    
                              @foreach ($tasks as $task)
                                <ul class="list-group">
                                    <a href="{{ url('/home', $task->id)}}" class="list-group-item"><div><strong>{{ $task->title }}</strong></div> 
                                        <div> Publish On : {{ $task->published_at }}</div></a>
                                 @endforeach
                                </ul>
                            <div class="panel-footer">
                                    <a href="/home/create" class="btn btn-info form-control" role="button" >
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        Create new task</a>
                                </div>
                        
                    @else




    
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

                            
                    <table class="table table-striped task-table" width="800">

                    <!-- Table Headings -->
                        <thead>
                            <th>Title</th>
                          <th>Status</th>
                           <th>Last Modified</th>
                          
                          </thead>
                          <!-- Table Body -->
                         <tbody>
                            @foreach($usertasks as $usertask)
                             <tr>
                                
                                    
                                <td>
                                   {{ $tasks->find($usertask->task_id)->title }}
                                </td>
                                <td>
                                    @if($usertask->status == 'active')
                                            <h4><span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   {{ $usertask->status }}</span> </h4>
                                            
                                     @elseif($usertask->status == 'passive')
                                            <h4><span class="label label-default"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>   {{ $usertask->status }}</span> </h4>
                                            
                                       @else
                                        
                                    @endif
                                     
                                </td>
                                <td>
                                     {{ $usertask->updated_at }}
                                </td>
                            </tr>
                        
                            
                             @endforeach
                         </tbody>
                    </table>

                            
                     <!--     @foreach ($usertasks as $usertask)
                                <ul class="list-group">
                                    <a class="list-group-item">{{ $usertask->title }} | Status : {{ $usertask->status }}</a>
                                    
                            @endforeach-->
                            </ul>








                    @endif
                </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection
