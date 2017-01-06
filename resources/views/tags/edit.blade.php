@extends('main')

@section('title', '| Tags')

@section('content')

	<div class = "row">
		<div class = "col-md-6 col-md-offset-4">
			<div class = "well">
			<h3>Edit</h3>
			<hr>
			{{ Form::model($tags, ['route' => ['tags.update', $tags->id], 'method' => 'PUT']) }}
			{{ csrf_field() }}

			{{ Form::label('name', 'Title : ') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			<br>
			{{ Form::submit('Save Changes', ['class' => 'btn btn-primary'] ) }}
			{{ Form::close() }}
			<br>
			<a href = {{ route('tags.show', $tags->id ) }} class = "btn btn-danger">Cancel</a>
			</div>
		</div>
	</div>

@endsection