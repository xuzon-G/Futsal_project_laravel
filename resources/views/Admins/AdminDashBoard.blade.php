

@extends('Admins.masterAdmin')
@section('sidebar')
<?php
function current_page($uri="/Admin_dashboard")
{
	return request()->path()==$uri;
}
?>

<nav class="main-nav">
	<ul class="main-nav-ul">
		<li><a href="#" style="text-align:center;">Admin Dashboard</a></li>
		<li class="has-sub {{current_page('viewAdmin')?'active':''}} {{current_page('addAdmin')?'active':''}}"><a href="#"><i class="fa fa-user" style="font-size:18px"></i> Manage Admin<span class="caret sub-arrow"></span></a>
			<ul >
				<li><a href="/viewAdmin">View Admins</a></li>
				<li  ><a href="/addAdmin">Add Admin</a></li>
				
				
			</ul>
		</li>
		<li  class="{{current_page('Users')?'active':''}}"><a href="/Users">View Users</a></li>
		<li  class="{{current_page('viewBooking')?'active':''}}"><a href="/viewBooking"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Bookings Details</a></li>
		<li  class="{{current_page('bookingStatus')?'active':''}}{{current_page('bookNowAdmin')?'active':''}}"><a href="/bookNowAdmin"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Book Field Admin</a></li>
		<li>  <form action="/logout" method="post" id="logout-form">
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
 