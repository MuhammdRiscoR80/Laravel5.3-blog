@extends('main')

@section('title', '| View Posts')

@section('content')
 	<div class = "row">
 	   <div class = "col-md-8">
 			<h1>{{ $post->title }}</h1>
 			<hr>
 			@foreach($post->tags as $tag)
 				<div class = "label label-default">{{ $tag->name }}</div>
 			@endforeach
			<p class = "lead">{!! $post->body !!}</p>
	   </div>
	   
	   <div class = "col-md-4">
	    <div class = "well">
	    	<div class = "text-center">
	    		<p>URL : <a href = {{ route('blog.single', $post->slug) }}>{{ route('blog.single', $post->slug) }}</a></p>
	        </div>
	        <br>
	        <dl class = "dl-horizontal">
	        	<dt>Category :</dt>
	    		<dd>{{ $post->category->name}}</dd>
	        </dl>
	        <br>
	        <dl class = "dl-horizontal">
	   			<dt>Created At:</dt>
	   			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
	   		</dl>
	   		
	   		<dl class = "dl-horizontal">
	   			<dt>Last Update:</dt>
	   			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
	   		</dl> 
		    <hr>
		    <div class = "row">
		    	<div class = "col-sm-6">
		    		{!! Html::linkroute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
		    	</div>
		    	<div class = "col-sm-6">
		    		{{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) }}
		    		{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
		    		{{ Form::close() }}
		    	</div>
	      	</div>

	      	<div class = "row">
	      		<div class = "col-md-12">
	      			<a href = '/' class = "btn btn-default btn-block btn-h1-spacing">See All Post</a>
	      		</div>
	      	</div>
		  </div>
	    </div>
	 </div>

	 <div class = "row"> 
	      <div class = "col-md-8"> 
	         <h4>Comment </h4><smile>{{ $post->comments->count() }} comment</smile>
	         <hr class = "margin-top:20px;">
	         <table class = "table">
	         	<thead> 
	         	  <tr>
	         		<th>#</th>
	         		<th>Name</th>
	         		<th>Email</th>
	         		<th>Comment</th>
	              </tr>
	         	</thead>

	         	<tbody>
	         	     @foreach($post->comments as $comment)
	         	      <tr> 
	         		   <th>{{ $comment->id }}</th>
 					   <td>{{ $comment->name }}</td>
 					   <td>{{ $comment->email }}</td>
 					   <td>{{ substr($comment->comment, 0, 200) }} {{ strlen($comment->comment > 200 ? "..." : "") }}</td>
 					   <td><a href = "{{ route('comment.edit', $comment->id) }}" class = "btn btn-primary">Edit</a></td>
 					   <td><a href = "{{ route('comment.delete', $comment->id)}}" class = "btn btn-danger">Delete</a></td>
 					 </tr>
 					 @endforeach
	         	</tbody>
	         </table>
	      </div>
	 	
@endsection