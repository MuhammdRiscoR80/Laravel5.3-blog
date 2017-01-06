<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laravel @yield('title') </title>

    <!-- Bootstrap -->
    <link href="\css\bootstrap-3.3.7\dist\css\bootstrap.css" rel="stylesheet">
    <!--<link href=" {[ asset(css\bootstrap-3.3.7\dist\css\bootstrap.css) }}" rel="stylesheet">-->
    {!! Html::style('/css/styles.css') !!}
    @yield('stylesheet')
    
  </head>
  <body>