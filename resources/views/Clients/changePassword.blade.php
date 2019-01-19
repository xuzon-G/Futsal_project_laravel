@extends('Clients.ClientDashBoard')
@section('MenuContent')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
<div class="panel panel-success">
  <div class="panel-heading">Change Password</div>
  <div class="panel-body">
            <form action="/changePassword" method="post">
              {{csrf_field()}}

             
            
              <div class="form-group {{$errors->has('current-password') ? 'has-error' : ''}}">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="password" name="current-password" class="form-control" placeholder="Old Password" >
                </div>
                <div class="col-md-offset-1 ">
                @if ($errors->has('first_name'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('current-password') }}</p>
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
                <div class="col-md-offset-1 ">
                @if (@$error!="")
                                    <span class="help-block ">
                                        <p class="text-danger">{{ @$error }}</p>
                                    </span>
                                    @endif
                                </div>
                                  <div class="col-md-offset-1 ">
                @if (@$success!="")
                                    <span class="help-block ">
                                        <p class="text-success">{{ @$success }}</p>
                                    </span>
                                    @endif
                                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input type="submit" value="Change" class="btn btn-success btn-block">
                </div>
              </div>
              
              
              
              

            </form>

</div>
</div>
</div>
@endsection