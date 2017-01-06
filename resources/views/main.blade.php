@include('Partials._head')
   
@include('Partials._nav')
      
<div class = "container">
@include('Partials._messages')

@yield('content')

@include('Partials._footer')

@yield('script');

@include('Partials._scripts')
</body>
</html>