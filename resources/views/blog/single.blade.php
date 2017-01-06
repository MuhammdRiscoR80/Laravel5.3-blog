@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')
	
	<div class = "row">
	  	<div class = "col-md-8 col-md-offset-2">
	  	    <img src = {{ asset('images/'.$post->image)}}>
	  		<h1>{{ $post->title }}</h1>
	  		<p>{!! $post->body !!}</p>
	  		<hr>
	  		<p>Category : {{ $post->category->name }}</p>
	  	</div>
	</div>
	<hr>
	<div class = "row">
	   <div class = "col-md-8 col-md-offset-2">
	  		@foreach($post->comments as $comment)
	  			<p><strong>Name  :{{ $comment->name}}</strong></p>
			    <p>Email :{{ $comment->email}}</p>
			    <p>Comment <br>{{ $comment->comment}}</p><br><br>
	 		 @endforeach
	    </div>
	</div>

	<div class = "row"> 
	  <div id = "comment-form" class = "col-md-8 col-md-offset-2">   
	  {{ Form::open(['route' => ['comment.store', $post->id], 'method' => 'POST']) }}
	  {{ csrf_field() }}
	  <div class = "row">
	  	<div class = "col-md-4">
		  	{{ Form::label('name', "Name : ") }}
		  	{{ Form::text('name', null, ['class' => 'form-control'] )}}
	  	</div>
	  	<div class = "col-md-4">
		  	{{ Form::label('email', "Email : ") }}
		  	{{ Form::email('email', null, ['class' => 'form-control'] )}}
	  	</div>
	  	<div class = "col-md-8">
	  		{{ Form::label('comment', "Comment :") }}
	  		{{ Form::textarea('comment', null, ['class' => 'form-control']) }}

	  		{{ Form::submit('add Comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
	  	</div>
	  </div>
	  </div>
	</div>
	
@endsection