@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-heading"><h3>Edit Task : {{ $task->title }}</h3></div>

                <div class="panel-body">
                    

                    @if($errors->any())
                        <ul class ="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                       
                        @endforeach
                         </ul>
                    @endif


                    
                   {!! Form::model($task ,['method' => 'PATCH' , 'action' => ['HomeController@update', $task->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Detail:') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('uid', 'User:') !!}
                          
                                 <select name="uid" class="form-control">
                                    @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                       
                                    
                                     
                                    @endforeach
                                    
                                 </select>

                         </div>
                         <div class="form-group">
                            {!! Form::label('published_at', 'Publish On:') !!}
                            {!! Form::input('date','published_at', date('Y-m-d') , ['class' => 'form-control']) !!}
                        </div>
                        
                   
                </div>
                      
                <div class="panel-footer">
                    <div class="form-group">
                        <center>
                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                            <a href="/home" class="btn btn-danger" role="button">Cancel</a>
                        </center>
                    </div>

                    
                   
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection