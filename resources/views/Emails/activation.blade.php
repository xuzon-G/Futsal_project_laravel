<h1>Hello</h1>
<p>
	Please Click on the following Link to activate your account,
	<a href="{{env('App_URL')}}/activate/{{$user->email}}/{{$code}}">activate Account</a>
</p>