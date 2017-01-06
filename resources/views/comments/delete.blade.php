@extends('main')

@section('title', "Delete Comment")

@section('content')

	<div class = "row">
	  <div class = "col-md-8 col-md-offset-2 "> 
	    <div class = "well">
	    <h3>Delete Comment</h3>
	    <h4>Name    : </h4><small>{{ $comment->name }}</small>
	    <h4>Email   : </h4><small>{{ $comment->email }}</small>
	    <h4>Comment : </h4><small>{{ $comment->comment }}</small>
	    {{ Form::open(['route' => ['comment.destroy', $comment->id ], 'method' => 'DELETE']) }}
	    	{{ Form::submit('Delete Comment', ['class' => 'btn btn-danger btn-block btn-h1-spacing' ])}}
	    {{ Form::close() }}
	    </div>
	 </div>
   </div>
@stop 