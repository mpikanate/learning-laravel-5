@extends('layouts.app')
@section('content')
	

<div class="container" ng-app="todoApp" ng-controller="todoController">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-heading"><h2>Tasks List</h2></div>

                <div class="panel-body">
                	<center><i ng-show="loading2" class="fa fa-spinner fa-spin" ></i></center>
                	<ul class="list-group" >
				<div ng-repeat='task in tasks' ng-show="titleTab">
                                    			<a href="#" class="list-group-item" ng-click="front($index)"><div><strong><% task.title %></strong></div> 
                                       	 	<div> Publish On : <% task.published_at %></div></a>
                                       	 </div>
                                       	 <div ng-show="userTaskTab">

                                                    <h4><strong>Title : </strong><%  tmpTasks.title %></h4>


                                                    <task>
                                                              <h4><strong>Body : </strong><% tmpTasks.body %></h4>
                                                    </task>

                                                     <hr/>

                                    			<table class="table table-striped task-table">	
                                    				<!-- Table Headings -->
                        					<thead>
                            					<th>Name</th>
                         						 <th>Status</th>
                          					<th></th>
                          				</thead>
                                    				  <tbody ng-repeat ="list in listsuser">



                                    				  	<td><% list.user.name  %></td>
                                    				  	<td><% list.status  %></td>
                                    				  	<td> 
                                    				  		<div ng-if ="list.status == 'active'">
                                            						<h4><span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Actived</span> </h4>
                                         					</div>
                                                                        
                                         					<div ng-if ="list.status == 'passive'">
                                            							<button  class="btn btn-primary" data-toggle="modal" data-target="#myModal" ng-click="getUserDetail(list.id)">
                                              							<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>  Signed
                                                                                      </button>        

                                           					 </div>

                                                                                        <div class="modal fade" id="myModal">
                                                                                               <div class="modal-dialog">
                                                                                                  <div class="modal-content">
                                                                                                      <div class="modal-header">
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                                                          <h4 class="modal-title" id="myModalLabel">Confirm your password</h4>
                                                                                                        </div>
                                                                                                    <div class="modal-body">
                                                                                                        <h4>ID : <%  tmpUsertask.id %></h4>

                                                                                                       <h4>Welcome : <%  tmpUsertask.user.name %></h4>

                                                                                                       <h4>Status : <%  tmpUsertask.status %></h4>

                                                                                                        <form >
                                                                                                            <div class="form-group">
                                                                                                                Password: <input type="password" name="password"  required> 
                                                                                                                <input type="submit" value="Submit" class= "btn btn-success" >
                                                                                                            </div>
                                                                                                         </form>

                                                                                                  </div>
                                                                                                   <div class="modal-footer">
                                                                                                    </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>

                                    				  	</td>

                    					</tbody>
                                    			</table>
                                       	 </div>
                                 	
                                	</ul>

                
                
                </div>

            </div>
              <div>
                                    <a  class="btn btn-info form-control" role="button" ng-click="back()" ng-show="userTaskTab">Back</a>
                                	 <a href="/home/create" class="btn btn-info form-control" role="button" ng-show="titleTab">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        Create new task</a>
                                </div>
        	</div>
             
    </div>
</div>
		

@endsection