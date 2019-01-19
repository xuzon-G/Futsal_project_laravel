@extends('layout.master')

@section('content')

			<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-offset-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Login Here</h3>			
					</div>
						<div class="panel-body">
						<form action="/login" method="post">
							{{csrf_field()}}
								

							<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" name="email" class="form-control" placeholder="example@example.com" value="{{old('email')}}">
								
								</div>
									<div class="col-md-offset-1 ">
								@if ($errors->has('email'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group {{session('error') ? 'has-error': ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							</div>

							
															
									<div class="checkbox col-md-offset-1">
											<label>
											<input type="checkbox" name="checkbox">Remember me</label>
										</div>
								
							

								
							
							
							<div class="form-group">
								
									<input type="submit" value="Login" class="btn btn-primary btn-block">
								
							</div>
								@if(session('error'))
								<div class="row">
								<div class="col-md-8 col-md-offset-1"><span class="text text-danger" >{{session('error')}}</span></div> 
							</div>
								@endif
								<div class="row"><div class="col-md-4 col-md-offset-8"><a href="/forgot-password">Forgot your password?</a></div>
						</div>
							
							
							

						</form>
						</div>
							
					</div>
				</div>
			</div>
		</div>

@endsection
	
