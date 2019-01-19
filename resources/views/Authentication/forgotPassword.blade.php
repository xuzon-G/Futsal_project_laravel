@extends('layout.master')

@section('content')

		<div class="row">
			<div class="container">
			<div class="col-lg-6 col-md-offset-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Forgot Password</h3>			
					</div>
						<div class="panel-body">
						<form action="/forgot-password" method="post">
							{{csrf_field()}}

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" name="email" class="form-control" placeholder="example@example.com" required>
									 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								</div>
							</div>
							
						
							
							
							<div class="form-group">
								
									<input type="submit" value="Send Code" class="btn btn-primary btn-block">
								
							</div>
						
							
							

						</form>
						</div>
							
					</div>
				</div>
			</div>
		</div>

@endsection
	
