@extends('layout')

@section('content')
    <h1>Register</h1>

    <hr/>

   {!! Form::open(['url' => 'users']) !!}

   			<div class="form-group">
		
    			{!!Form::label('name' , 'Name:')!!}
   		 		{!!Form::text('name' , null )!!}
		
			</div>
			<div class="form-group">
		
    			{!!Form::label('email' , 'E-mail:')!!}
   		 		{!!Form::text('email' , null )!!}
		
			</div>
	

			<div class="form-group">

    			{!!Form::label('password' , 'Password:')!!}
   			 	{!!Form::text('password' , null )!!}

			</div>

			<div class="form-group">

    			{!!Form::label('password' , 'Confirm Password:')!!}
   			 	{!!Form::text('password' , null )!!}

			</div>
			<div class="form-group">
				{!!Form::label('usertype' , 'User Type:')!!}
    			{!!Form::select('Type', array('A' => 'Admin', 'B' => 'User'));!!}

			</div>

			<div class="form-group">
				{!! Form::submit('Register' , ['class' => 'btn btn-primary']) !!}
			</div>
			
	{!! Form::close() !!}
@stop