@extends('main')

@section('title', '| Login')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class = "row">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "panel panel-default">
                <div class = "panel-heading">Reset</div>
                <div class = "panel-body">
                {{ Form::open(['url' => '/password/reset']) }}
                {{ csrf_field() }}
                {{ Form::hidden('token', $token) }}

                {{ Form::label('name', 'Name :') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email :') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password :') }}
                {{ Form::password('password',  ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Password-Confirmation :') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('RESET', ['class' => 'btn btn-danger btn-block']) }}
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection