@extends('main')

@section('title', "Edit Comment")

@section('content')

	<div class = "row">
	  <div class = "col-md-8 col-md-offset-2 "> 
	    <div class = "well">
	    <h3>Edit Comment</h3>
	    {{ Form::model($comment, ['route' => ['comment.update', $comment->id ], 'method' => 'PUT']) }}
	    {{ csrf_field() }}

	    {{ Form::label('name', 'User : ') }}
	    {{ Form::text('name', null, ['class' => 'form-control']) }}

	    {{ Form::label('email', 'Email :') }}
	    {{ Form::email('email', null, ['class' => 'form-control']) }}

	    {{ Form::label('Comment', 'Comment : ') }}
	    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

	    {{ Form::submit('Save Changes ', ['class' => 'btn btn-success btn-block btn-h1-spacing' ]) }}
	    </div>
	 </div>
   </div>
@stop 