@extends('layouts.login_register_common2')

@section('content')
<div class="appointment-w3" style="opacity:0.8;">
<form action="#" method="post">

    <div class="form-control-w3l">

          <input type="text" id="name" name="name" placeholder="Your name...">
     </div>
      <div class="form-control-w3l">

              <input type="email" id="email" name="email" placeholder="Mail@example.com" title="Please enter a Valid Email Address" required="">
       </div>
      <div class="form-control-w3l">

           <input type="text" id="orgn" name="phone number" placeholder="Phone Number" title="Please enter your Phone Number" required="">
      </div>
           <div class="form-control-w3l">

                   <input  id="datepicker1" name="text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" placeholder="mm/dd/yyyy" required="">
           </div>
            <div class="form-control-w3l">

               <input type="text" id="timepicker" name="time" class="timepicker form-control-w3l" placeholder="Time" value="">
           </div>
<div class="form-control-w3l">
<textarea id="message" name="text" placeholder="Reason for appointment..."></textarea>
</div>
<input type="submit" value="Register">
</form>
</div>

<!-- <div class="container">

    <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style=" margin-top:-550px;">

        <div class="panel panel-info" style="opacity:0.8;">
            <div class="panel-heading">

                <div class="panel-title">
                    Sign Up

                    <div class="" style="float:right; font-size:85%; position:relative; top:-10px;">
                    </div>
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" action="{{route('trainee.registered')}}" method="post">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter your Name here" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <label for="email" class="col-md-3 control-label" >Email</label>

                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter your Email address here" autofocus>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="Enter your Password here" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label" style="margin-top:-10px;">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <!-- <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info" style="margin-top:-10px;"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                        </div>
                    </div>
                </form>

            </div>
        </div> -->


    </div>
</div> -->
</div>

@endsection
