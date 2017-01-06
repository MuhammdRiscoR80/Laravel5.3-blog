@extends('main')

@section('title' , '| Contact')

@section('stylesheet')
   <link href="css\style.css" rel="stylesheet">
@endsection

@section('content')
   <div class = "col-md-12">
       <h1>Contact Me</h1>
       <hr>
         <form class = "form-group" action = {{ url('contact') }} method = 'POST'>
           {{ csrf_field() }}
           <label name= "email">Email :</label>
           <input id="email" name = "email" class = "form-control">

           <label name= "subject">Subject :</label>
           <input id="subject" name = "subject" class = "form-control">

         <div class = "form-group">
           <label name= "message">Message :</label>
           <textarea id="message" name = "message" class = "form-control"></textarea>
         </div>

         <input type = "submit" class = "btn btn-success" value = "Send Messasage">
         </form>
   </div>
@endsection
   