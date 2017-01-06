@extends('main')

@section('title', '| Tags')

@section('content')

	<div class = "row">
		<div class = "col-md-8">
			<h3>Tag</h3>
			<table class = "table">
				<thead>
				<tr>
					<th>#</th>
					<th>Tags</th>
				</tr>
				</thead>

				<tbody>
				@foreach($tags->all() as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td>{{ $tag->name }}</td>
						<td>
							<a href = {{ route('tags.show', $tag->id )}} class = "btn btn-default">View</a>
						</td>
					</tr>	
				@endforeach
				</tbody>
			</table>
		</div>
		<div class = "col-md-3 col-md-offset-1">
			<div class = "well">
			{{ Form::open(['route' => 'tags.store', 'method' => 'POST' ]) }}
				{{ Form::label('name', 'Add Tag :') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Add Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
			{{ Form::close() }}
			</div>
		</div>	
	</div>

@endsection