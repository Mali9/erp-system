<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    <body style="background-color: #a2a2a2">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">Zodiak</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/buses') }}">buses</a></li>
      <li><a href="{{ url('/captains') }}">captains</a></li>
      <li><a href="{{ url('/foundations') }}">Foundations</a></li>
      <li><a href="{{ url('/col_points') }}">نقط التجمع </a></li>
      <li><a href="{{ url('/users') }}">users</a></li>
      <li><a href="{{ url('/representatives') }}">representatives</a></li>

    </ul>

  </div>
</nav>  

@yield('content')


    </body>

</html>
