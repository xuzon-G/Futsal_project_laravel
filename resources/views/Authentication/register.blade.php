@extends('layout.master')

@section('content')
		<div class="row">
			<div class="container">
			<div class="col-lg-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Register Here</h3>			
					</div>
						<div class="panel-body">
						<form action="/register" method="post">
							{{csrf_field()}}

							<div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" name="email" class="form-control " placeholder="example@example.com" value="{{old('email')}}">

								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('email'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </span>
                                    @endif
                                </div>
								
							</div>
							<div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('first_name'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('last_name'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
								
							<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
							
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" placeholder="Password">

								</div>
								

							</div>
							
							<div class="form-group {{$errors->has('password') ? 'has-error' : ''}} ">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('password'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group">
								
									<input type="submit" value="Register" class="btn btn-success btn-block">
								
							</div>
							
								<hr style="border-width: 1.5px;color:red;">
							
							

						</form>
						</div>
							
					</div>
				</div>
			</div>
		</div>





@endsection


	
