@extends('main')

@section('title', '| All Post')

@section('content')

	<div class = "row">
	 	<div class = "col-md-10">
	 	    <h1>All Post</h1>
	 	</div>

	 	<div class = "col-md-2">
	 		<a href = "{{ route('posts.create') }}" class = "btn btn-primary btn-block bn-lg btn-h1-spacing">Create New Post</a>
	 	</div>
	 	<hr>
	</div><!--end of .row-->

	<div class = "row">
		<div class = "col-md-12">
			<table class = "table">
				<thead>
					<th>#</th>
					<th>title</th>
					<th>body</th>
					<th>created_at</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($posts->all() as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
							<td><a href = "{{ route('posts.show', $post->id) }}" class = "btn btn-default">View</a> 
							<a href = "{{ route('posts.edit', $post->id) }}" class = "btn btn-default">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class = "text-center">
				{{ $posts->links() }}
			</div>
		</div>
	</div>

@stop
