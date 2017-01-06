@extends('main')

@section('title' , '| Blog Post')

@section('content')

	<div class = "row">
	    <div class = "col-md-8">
	     @foreach($posts as $post)

       <div class = "post">
           <h3>{{ $post->title }}</h3>
           <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
           <a href = {{ url('blog/'. $post->slug) }} class = "btn btn-primary">Read More</a>
       </div>

       <hr>

       @endforeach
        <div class = "text-center">
	    {{ $posts->links() }}
	    </div>
	    </div>
	</div>

@endsection