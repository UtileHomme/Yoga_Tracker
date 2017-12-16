@extends('layouts.login_register_common')

@section('content')

<div class="main" style="opacity:1.5;">
    <div class="main-w3lsrow">
        <!-- login form -->
        <div class="login-form login-form-left">
            <div class="agile-row">
                <h2 class="login-f">Login Form</h2>
                <div class="login-agileits-top">
                    <form action="{{ route('admin.login') }}" method="post" >
                        {{ csrf_field() }}


                    <div class="form-group">
                        <p class="email">Email Id:</p>

                        <div class="input-group">
                            <!-- <span class="input-group-addon" style="color:red;"> -->
                                <!-- <svg version="1.1" class="" x="0px" y="0px"
                                viewBox="-255 347 100 100" xml:space="preserve" height="22px" width="30px">
                                <path  d="
                                M-203.7,350.3c-6.8,0-12.4,6.2-12.4,13.8c0,4.5,2.4,8.6,5.4,11.1c0,0,2.2,1.6,1.9,3.7c-0.2,1.3-1.7,2.8-2.4,2.8c-0.7,0-6.2,0-6.2,0
                                c-6.8,0-12.3,5.6-12.3,12.3v2.9v14.6c0,0.8,0.7,1.5,1.5,1.5h10.5h1h13.1h13.1h1h10.6c0.8,0,1.5-0.7,1.5-1.5v-14.6v-2.9
                                c0-6.8-5.6-12.3-12.3-12.3c0,0-5.5,0-6.2,0c-0.8,0-2.3-1.6-2.4-2.8c-0.4-2.1,1.9-3.7,1.9-3.7c2.9-2.5,5.4-6.5,5.4-11.1
                                C-191.3,356.5-196.9,350.3-203.7,350.3L-203.7,350.3z" /> -->
                            <!-- </svg> -->
                        </span>
                            <input type="email" class="email" name="email" value="{{ old('email') }}" required />
                        </div>
                        <!-- /.input group -->
                    </div>
                    </div>

                    <div class="form-group">
                    <p>Password</p>
                    <div class="input-group">
                        <!-- <span class="input-group-addon" style="color:red;"> -->
                            <!-- <svg version="1.1" class="password-icon" x="0px" y="0px"
        viewBox="-255 347 100 100" height="22px" width="30px">
          <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
          l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
        </svg> -->
                    <!-- </span> -->
                    <input type="password" class="password" name="password" required=""/>
                    </div>
                </div>
                    <!-- <label class="anim">
                    <input type="checkbox" class="checkbox" id="login-remember" name="remember" value="1">
                    <span> Remember me ?</span>
                </label> -->
                <input type="submit" value="Login">
            </form>
        </div>
        <div class="login-agileits-bottom">
            <h6 class="forgot-password"><a href="{{ route('admin.password.request') }}">Forgot password?</a></h6>
        </div>
        <div class="login-agileits-bottom1">
            <h3>(or)</h3>

        </div>
        <div class="social_icons agileinfo">
            <ul class="top-links">
                <li><a href="{{ url('login/google') }}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ url('login/google') }}"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>

    </div>

</div>
</div>
</div>


@endsection
