@extends('layouts.app')
@section('content')
	
      <div ng-app="createApp" >
      
	    
      	<div  ng-controller="CreateNewItemController">
        		<div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                

                                <div class="panel-heading"><h3>Write a new Task</h3></div>
                    
                                <div class="panel-body">

                                               
                                        <form name="myForm" novalidate>
                                               <div class="form-group">
                                                        <label for="title">Title:</label>
                                                        <input class="form-control" name="title" type="text" id="title" ng-model="user.title" required>
                                                        <span style="color:red" ng-show="myForm.title.$dirty && myForm.title.$invalid">
                                                        <span ng-show="myForm.title.$error.required">Title is required.</span>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">Detail:</label>
                                                        <textarea class="form-control" name="body" cols="50" rows="10" id="body" ng-model="user.body" required></textarea>
                                                        <span style="color:red" ng-show="myForm.body.$dirty && myForm.body.$invalid">
                                                        <span ng-show="myForm.body.$error.required">Body is required.</span>
                                                        </span>
                                                    </div>
                                                
                                                     <div class="form-group">
                                                        <label for="published_at">Publish On:</label>
                                                        <input  name="published_at" type="date"  id="published_at" ng-model="user.published_at" required>
                                                        <span style="color:red" ng-show="myForm.published_at.$dirty && myForm.published_at.$invalid">
                                                        <span ng-show="myForm.published_at.$error.required">Published On  is required.</span>
                                                        </span>
                                                    </div>
                                              
                                              
                                              
                                
                                </div>
                                      
                                <div class="panel-footer">
                                    <center>
                                                        <input class="btn btn-success" type="submit" value="Create" ng-click="update(user)" ng-disabled="myForm.title.$error.required || myForm.body.$error.required || myForm.published_at.$error.required" >
                                                       
                                              </form>
                                                            <a  href="todoapp" class="btn btn-info" role="button">Cancel</a> 
                                      </center>
                                      
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


    	</div>
    	
	
      </div>
 

		

@endsection