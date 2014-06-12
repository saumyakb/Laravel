<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
     @include('layout.navigation')
              
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
    <h1>Hello, <?php echo $name; ?></h1> 
       
       @yield('content')
       <br/>
    </div>
  </body>
</html>