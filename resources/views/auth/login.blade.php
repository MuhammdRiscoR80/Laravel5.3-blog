@extends('main')

@section('title', '| Login')

@section('content')

    <div class = "row">
        <div class = "col-md-6 col-md-offset-3"> 
        <div class = "panel panel-default">
            <div class = "panel-heading">Login</div>
                <div class = "panel-body">
                {{ Form::open(['class' => 'form-horizontal']) }}

                {{ Form::label('email', 'Email :') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password :') }}
                {{ Form::password('password',  ['class' => 'form-control']) }}

                {{ Form::checkbox('remember', 'Remember Me', ['class' => 'form-control']) }}
                {{ Form::label('remeber', 'Remember Me')}}

                <br>
                {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
                {{ Form::close() }}
                <div class = "well">
                    <a href= {{ url('/password/reset') }} >Forgot My Password </a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection