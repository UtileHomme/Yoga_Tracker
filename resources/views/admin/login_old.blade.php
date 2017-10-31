@extends('layouts.login_register_common')

@section('content')
<div class="container" >
    <div class="row">
        <div class="" id="loginbox" style="margin-top:-550px; opacity:0.8;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        Sign In
                    </div>

                    <div class="" style="float:right; position:relative; top:-23px">
                        <a href="{{ route('admin.password.request') }}">Forgot Password?</a>
                    </div>

                    <div class="" style="padding-top:30px" class="panel-body">

                        <form  autocomplete="off" role="form" class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            {{ csrf_field() }}

                            <div class="input-group" style="margin-bottom: 25px;">

                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your Registered Email Id">

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" required>
                            </div>

                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <button type="submit" class="btn btn-success" style="margin-left:10px;" >
                                    Login
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
