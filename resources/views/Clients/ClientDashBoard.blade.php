
<?php
function current_page($uri="/Client_dashboard")
{
	return request()->path()==$uri;
}
?>
@extends('Clients.masterClient')
@section('user')

{{Sentinel::getUser()->email

}}
@endsection
@section('content')

@section('sidebar')
<nav class="main-nav">
	<ul class="main-nav-ul">
		<li><a href="#" style="text-align:center;">User Dashboard</a></li>
		

		<li  class="{{current_page('myBooking')?'active':''}}"><a href="/myBooking"><i class="	fa fa-soccer-ball-o " style="font-size:15px"></i> My Bookings</a></li>
			<li class="{{current_page('bookNow')?'active':''}} {{current_page('availableTime')?'active':''}}"><a href="/bookNow"><i class="	fa fa-soccer-ball-o" style="font-size:15px"></i> New Booking</a></li>

		<li  class="{{current_page('changePassword')?'active':''}}"><a href="/changePassword"><i class="	fa fa-soccer-ball-o " style="font-size:15px"></i> Change Password</a></li>
		<li >  <form action="/logout" method="post" id="logout-form">
             {{csrf_field()}}
           <a href="#" onclick="document.getElementById('logout-form').submit()" ><i class="fa fa-sign-out" style="font-size:18px;color:white;"></i>Logout</a> 
          </form> </li>
		
	</ul>
</nav>

<script type="text/javascript" src="{{{ URL::asset('js/jquery.min.js')}}}"></script>
<script type="text/javascript">
$(document).ready(function(e)
{
$('.has-sub').click(function(){

$("ul ul").slideToggle(500);
});



});

</script>

@endsection