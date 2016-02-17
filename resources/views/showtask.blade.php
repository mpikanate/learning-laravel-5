@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-heading"><h3>{{ $tasks->title }}</h3></div>

                <div class="panel-body">
                   <task>
                        
                   </task>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-success" role="button">Accept</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection