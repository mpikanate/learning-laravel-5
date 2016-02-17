@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-heading"><h3>{{ $task->title }}</h3></div>

                <div class="panel-body">
                  @if($errors->any())
                        <ul class ="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                       
                        @endforeach
                         </ul>
                    @endif
                    <detail>
                        <h4>Please confirm password </h4>
                        <h4>User : {{ $user->name }}</h4>
                   </detail>
                   <hr/>
                      {!! Form::open([  'action' => ['UserTasksController@checkpassword', $usertasks->id]]) !!}
                        <div class="form-group">
                            Password: <input type="password" name="password"  required> 
                            {!! Form::submit('OK', ['class' => 'btn btn-success']) !!}
                        </div>
                      {!! Form::close() !!}
                        

                <div class="panel-footer">
                  @if( $errormessage == 'miss')
                    <div class="alert alert-danger">
                      <strong>Incorrect Pasword!</strong>
                    </div>

                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection