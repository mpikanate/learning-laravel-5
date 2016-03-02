@extends('layouts.app')
@section('content')
	
      <div ng-app="mainApp" >

	    
      	<div  ng-controller="todoController">
        		<ng-view></ng-view>

    	</div>
    	
	
      </div>

@endsection