

<nav class="navbar navbar-inverse " >
  <div class="container-fluid">
    <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">KICK OFF FUTSAL</a>
    </div>
     <div class="collapse navbar-collapse navbar-right" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
        @if (Sentinel::check())
         <li class="u-email">
          <span > @yield('user')</span>
         </li>
         <li class="lg"> 
         
         </li>
        @else
      <li><a href="/register"><span ><i class="fa fa-user" style="font-size:17px"></i></span> Register</a></li>
      <li><a href="/login"><span ><i class="fa fa-futbol-o" style="font-size:15px"></i></span> Login</a></li>
    @endif
    </ul>
  </div>
</div>
</nav> 



