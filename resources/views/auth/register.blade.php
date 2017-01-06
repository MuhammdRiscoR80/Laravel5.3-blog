@extends('main')

@section('title', '| Register')

@section('content')

    <div class = "row">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "panel panel-default">
                <div class = "panel-heading">Register</div>
                <div class = "panel-body">
                {{ Form::open() }}

                {{ Form::label('name', 'Name :') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email :') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password :') }}
                {{ Form::password('password',  ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Password-Confirmation :') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection