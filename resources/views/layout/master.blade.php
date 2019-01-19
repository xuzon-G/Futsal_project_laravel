<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" />
   <link rel="stylesheet" href="{{{ URL::asset('bootstrap/css/font-awesome.min.css')}}}" />
     <link rel="stylesheet" href="{{ URL::asset('css/topmenu.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URl::asset('css/simple-sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URl::asset('css/AdminTable.css')}}">
 <script type="text/javascript" src="{{{ URL::asset('js/jquery.min.js')}}}"></script>
  <script src="{{{ URL::asset('js/bootstrap.min.js')}}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

  </head>

<body style="background-image: url(images/fut3.jpg);background-repeat: no-repeat;    background-size:cover">
<div class="container-fluid" style="height: 100%;width: 100%">
  <div class="row">
    @include('layout.topmenu')
   </div> 

<div class="row">
<section>
@yield('content')
</section>
</div>



<div class="row">
<footer>
    @include('layout.footer')
</footer>      
</div>

</div>

 
  </body>
</html>
