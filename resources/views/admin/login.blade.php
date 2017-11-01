@extends('layouts.login_register_common')

@section('content')

<div class="main" style="opacity:0.5;">
    <div class="main-w3lsrow">
        <!-- login form -->
        <div class="login-form login-form-left">
            <div class="agile-row">
                <h2>Login Form</h2>
                <div class="login-agileits-top">
                    <form action="{{ route('admin.login') }}" method="post" >
                        {{ csrf_field() }}
                        <p>Email Id </p>
                        <input type="email" class="email" name="email" value="{{ old('email') }}" required autofocus />
                        <p>Password</p>
                        <input type="password" class="password" name="password" required=""/>
                        <!-- <label class="anim">
                            <input type="checkbox" class="checkbox" id="login-remember" name="remember" value="1">
                            <span> Remember me ?</span>
                        </label> -->
                        <input type="submit" value="Login">
                    </form>
                </div>
                <div class="login-agileits-bottom">
                    <h6><a href="{{ route('admin.password.request') }}">Forgot password?</a></h6>
                </div>
                <div class="login-agileits-bottom1">
                    <h3>(or)</h3>

                </div>
                <div class="social_icons agileinfo">
                    <ul class="top-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
