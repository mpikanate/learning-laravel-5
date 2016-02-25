<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                 
                <div class="panel-heading"><h2>Tasks List</h2></div>
                <div class="panel-body">
                  <center><i ng-show="loading2" class="fa fa-spinner fa-spin" ></i></center>
                	<ul class="list-group" >

                                       	 <div ng-hide="loading2">

                                                    <h4><strong>Title : </strong>{{ tmpTasks.title }}</h4>
								

                                                    <task>
                                                              <h4><strong>Body : </strong>{{ tmpTasks.body }}</h4>
                                                    </task>
                                                        
                                                     <hr/>

                                    			<table class="table table-striped task-table" >	
                                    				<!-- Table Headings -->
                        					<thead>
                            					<th>Name</th>
                         						 <th>Status</th>
                          					<th></th>
                          				</thead>
                                    				  <tbody ng-repeat ="list in listsuser">



                                    				  	<td>{{ list.user.name  }}</td>
                                    				  	<td>{{ list.status  }}</td>
                                    				  	<td> 
                                    				  		<div ng-if ="list.status == 'active'">
                                            						<h4><span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Actived</span> </h4>
                                         					</div>
                                                                        
                                         					<div ng-if ="list.status == 'passive'">
                                            							<!-- Original Modal
                                                                                      <button  class="btn btn-primary" data-toggle="modal" data-target="#myModal" ng-click="getUserDetail(list.id)">
                                              							<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>  Signed
                                                                                      </button>  -->      
                                                                                  <button class="btn btn-primary" ng-click="open(list.id)"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Signed</button>
                                           					 </div>

                                                                                         

                                    				  	</td>

                    					</tbody>
                                    			</table>
                                       	 </div>
                                 	
                                	</ul>

                
                
                </div>

            </div>
              <div>
                                    <a  ng-href="#/todoapp" class="btn btn-info form-control" role="button">Back</a>
                                </div>
        	</div>
             
    </div>

  

</div>
             
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Please Confirm Your Password</h3>
        </div>
       
         <form name="form-password" ng-submit="ok()">
        <div class="modal-body">

          Password :  <input ng-model = "user.password" type = "password" placeholder="Password"  required/><i ng-show="passwordloading" class="fa fa-spinner fa-spin" ></i>
          

         <div class="alert alert-danger" ng-if="statusmsg == 'Failed'">
                                                         <strong>Password is incorrect! Please try again.</strong>
        </div>
      </div>
        
        <div class="modal-footer">
            <input type="submit" id="submit-btn" value="OK" class="btn btn-primary"/> 
            </form>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
         {{ selected }}
    </script>






<div class="modal fade" id="myModal" >
              <div class="modal-dialog">
                           <div class="modal-content">
                                     <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                                                             <h4 class="modal-title" id="myModalLabel">Confirm your password</h4>
                                        </div>
                                        <div class="modal-body">
                                                       <h4>ID : {{  tmpUsertask.id  }}  </h4>

                                                        <h4>Welcome : {{  tmpUsertask.user.name }}</h4>

                                                         <h4>Status : {{ tmpUsertask.status }}</h4>

                                      <form class="form sign-up" name="signUpForm" ng-submit="submitForm(tmpUsertask.id)">
                                              Password : <input type="password" name="password" id="password" ng-model="formData.password" required/>
                                              <input type="submit" id="submit-btn" /> 
                                              <br/>
                                              <div class="alert alert-danger" ng-if="statusmsg == 'Failed'">
                                                         <strong>Password is incorrect! Please try again.</strong>
                                                   </div>
                                      </form>
                                               
                                                 
                                      </div>
                                       <div class="modal-footer">
                                                   
                                       </div>
                          </div>
              </div>
  </div>