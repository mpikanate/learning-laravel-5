@extends('layout')

@section('content')
    <h1>Log In</h1>

    <hr/>

   	{!! Form::open(['url' => 'users/login', 'method' => 'POST']) !!}
		<div class="form-group">
		
    			{!!Form::label('email' , 'E-mail:')!!}
   		 		{!!Form::text('email' , null )!!}
		
			</div>
	

			<div class="form-group">

    			{!!Form::label('password' , 'Password:')!!}
   			 	{!!Form::text('password' , null )!!}

			</div>


			<div class="form-group">
				{!! Form::submit('Login' , ['class' => 'btn btn-primary']) !!}
			</div>
			

			
	{!! Form::close() !!}

	
			<a href="users/create">Register Here<a>
@stop