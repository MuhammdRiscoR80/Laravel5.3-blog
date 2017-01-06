@extends('main')

@section('title' , '| Index')

@section('stylesheet')
   <link href="css\style.css" rel="stylesheet">
@endsection

@section('content')
  <!--Content-->  
  <div class = "col-md-12">
    <!--header-->
    <div class="jumbotron">
      <h1>Hello, Laravel!</h1>
      <p>Hey guys, thanks you for watching out tutorial dont forger to subcribe and keep watching !!</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>
    <!--page-->
    <div class = "col-md-8">

       @foreach($posts as $post)

       <div class = "post">
           <h3>{{ $post->title }}</h3>
           <p>{{ substr((strip_tags($post->body)), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
           <a href = {{ url('blog/'. $post->slug) }} class = "btn btn-primary">Read More</a>
       </div>

       <hr>

       @endforeach
    </div> <!--end col-->

    <!--side bar-->
    <div class = "col-md-3 col-md-offse-1">
       <h2>SideBar</h2>
    </div>
   </div>
@endsection

@section('script')
  <script src = "js/js.js"></script>
@endsection
