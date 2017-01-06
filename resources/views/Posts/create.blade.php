@extends('main')

@section('title' , '| Create New Posts')

@section('stylesheet')
   {!! Html::style('/css/parsley.min.css') !!}
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>
      tinymce.init({ 
      selector:'textarea' 
      });
   </script>
   </script>
@endsection

@section('content')
   <div class = "row">
     <div class = "col-md-8 col-md-offset-2">
  	    <h1>Create New Posts</h1>
  	    <hr>

  	    {!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}
            {{ csrf_field() }}

  	        {{ Form::label('title', 'Title : ') }}
  	        {{ Form::text('title', null, array('class' => 'form-control') )}}

            {{ Form::label('slug', 'Slug :') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

            {{ Form::label('category_id', 'Category :') }}
            <select class ="form-control" name = 'category_id'>
              @foreach($categories as $category)
                <option value = '{{ $category->id }}'>{{ $category->name }}</option>
              @endforeach
            </select>

            {{ Form::label('featured_image', 'Upload-Image : ')}}
            {{ Form::file('featured_image') }}

            {{ Form::label('tags', 'Tags :') }}
            <select class ="form-control" name = 'tags[]' multiple = "multiple">
              @foreach($tags as $tag)
                <option value = '{{ $tag->id }}'>{{ $tag->name }}</option>
              @endforeach
            </select>

			      {{ Form::label('body', 'Body : ') }}
  	        {{ Form::textarea('body', null, array('class' => 'form-control') )}}

  	        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:10px;')) }}

  	    {!! Form::close() !!}
     </div>
   </div>

@endsection

@section('script')

   {!! Html::script('/js/parsley.min.js') !!}

@endsection