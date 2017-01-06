@extends('main')

@section('title', "| $tags->name Tag")

@section('content')
	<div class = "row"> 
	  <div class = "col-md-8">
		<h1>{{ $tags->name }} <small> {{ $tags->posts()->count() }} Post</small></h1>
	  </div>
	  <div class = "col-md-2">
	  	<a href = {{ route('tags.edit', $tags->id ) }} class = "btn btn-md btn-primary">Edit</a>
	  </div>
	  <div class = "col-md-2">
	  	{{ Form::open(['route' => ['tags.destroy', $tags->id], 'method' => 'DELETE'] )}}
	  		{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
	  	{{ Form::close() }}
	  </div>
	</div>

	<div class = "row">
	  <div class = "col-md-12">
	    <table class = "table">    
	      <thead>
	      	<tr>
	      	   <th>#</th>
	      	   <th>Title</th>
	      	   <th>Tags</th>
	      	</tr>
	      </thead>

	      <tbody>
	        @foreach($tags->posts as $post)
	        	<tr>
	        	   <th>{{ $post->id }}</th>
	        	   <td>{{ $post->title }}</td>
	        	   <td>
	        	   @foreach($post->tags as $tag)  
	        	   		<div class = "label label-default">{{ $tag->name }}</div>
	        	   @endforeach
	        	   </td>
	        	   <td>
	        	   <a href = {{ route('posts.show', $post->id) }} class = "btn btn-default">View</a>
	        	   </td>
	        	 </tr>
	        @endforeach 
	      </tbody>
	      </table>
	    </div>
	 </div>
@endsection