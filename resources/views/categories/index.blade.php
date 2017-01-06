@extends('main')

@section('title', '| Categories')

@section('content')

	<div class = "row">
		<div class = "col-md-8">
			<h3>Category</h3>
			<table class = "table">
				<thead>
				<tr>
					<th>#</th>
					<th>Categories</th>
				</tr>
				</thead>

				<tbody>
				@foreach($categories->all() as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>	
				@endforeach
				</tbody>
			</table>
		</div>
		<div class = "col-md-3 col-md-offset-1">
			<div class = "well">
			{{ Form::open(['route' => 'categories.store', 'method' => 'POST' ]) }}
				{{ csrf_field() }}

				{{ Form::label('name', 'Add Category :') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Add Categories', ['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
			{{ Form::close() }}
			</div>
		</div>	
	</div>

@endsection