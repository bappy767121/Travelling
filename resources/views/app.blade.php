<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="blog,resposive,sailor,bootstrap4,modern,html,html5,personal blog,agency blog,video,grid,Clean">
    <meta name="author" content="Dreambuzz">
    <link rel="icon" href="{{asset('/frontend/')}}/assets/images/logo.png">

    

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/frontend/')}}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--  Icon Font stylesheet  -->
    <link href="{{asset('/frontend/')}}/assets/css/icofont.css" rel="stylesheet">
    <link href="{{asset('/frontend/')}}/assets/css/font-awesome.css" rel="stylesheet">
    <!--   Common stylesheet  -->
    <link href="{{asset('/frontend/')}}/assets/css/style.css" rel="stylesheet">
    <!--   Custom stylesheet  -->
    <link href="{{asset('/frontend/')}}/assets/css/blog.css" rel="stylesheet">
    <!--   Responsive stylesheet  -->
    <link href="{{asset('/frontend/')}}/assets/css/responsive.css" rel="stylesheet">
    @vite('resources/js/app.js')
    @inertiaHead
    <!-- <title>{{$title}}</title> -->
  </head>
  <body>
    @inertia
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{asset('/frontend/')}}/assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('/frontend/')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('/frontend/')}}/assets/bootstrap/js/bootstrap.min.js"></script>
    <!--  Custom js  -->
    <script src="{{asset('/frontend/')}}/assets/js/custom.js"></script>
  </body>
  
</html>