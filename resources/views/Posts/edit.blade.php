@extends('main')

@section('title' , '| Edit Post')

@section('stylesheet')
   {!! Html::style('/css/parsley.min.css') !!}
   {!! Html::style('/css/select2-master/select2-master/dist/css/select2.min.css') !!}
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>
      tinymce.init ({ 
      selector:'textarea' 
      });
   </script>
   </script>
@endsection

@section('content')
	<div class = "row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id ], 'method' => 'PUT', 'files' => true]) !!}
 	   <div class = "col-md-8">
 	    	{{ Form::label('title', 'Title :') }}
 			{{ Form::text('title', null, array('class' => 'form-control')) }}
 			<br>
 			{{ Form::label('slug', 'Slug : ') }}
 			{{ Form::text('slug', null, array('class' => 'form-control')) }}
 			<br>
 			{{ Form::label('category_id', 'Category :') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
            <br>
            {{ Form::label('featured_image', 'Upload-Image : ')}}
            {{ Form::file('featured_image') }}
            <br>
 			{{ Form::label('tags', 'Tags :') }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple' => 'multiple'])}}
            <br>
 			{{ Form::label('body', 'Body :') }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
	   </div>

	   <div class = "col-md-4">
	    <div class = "well">
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
		    		{!! Html::linkroute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
		    	</div>
		    	<div class = "col-sm-6">
		    		{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
		    	</div>
	      	</div>
		  </div>
	    </div>
	    {!! Form::close() !!}
	 </div>
	
	
@stop

@section('script')
   {!! Html::script('/js/parsley.min.js') !!}
   {!! Html::style('/js/select2-master/select2-master/dist/js/select2.min.js') !!}
@endsection