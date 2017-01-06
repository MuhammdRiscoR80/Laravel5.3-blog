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
                {{ Form::open(['url' => '/password/email']) }}
                {{ csrf_field() }}
                {{ Form::label('email', 'Email :',['form-group']) }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('Send Reset Link Password', ['class' => 'btn btn-primary btn-block']) }}
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection