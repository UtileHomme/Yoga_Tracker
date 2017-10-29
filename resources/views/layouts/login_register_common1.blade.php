<!-- This is the home page of the website -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yoga Tracking Website') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }


    .bg-image
    {
        background-image:url(../images/yoga8.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-blend-mode: lighten;
        background-blend-mode:screen;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;

    }


    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .navbar_style
    {
        font-family:Abril Fatface;
    }

    .top-left {
        position: absolute;
        left: 10px;
        top: 18px;
    }

    /*Changing the color of the placeholder */
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    red;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color:    red;
       opacity:  1;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
       color:    red;
       opacity:  1;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
       color:    red;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
       color:    red;
    }
    </style>
</head>
<body>

    <div class="bg-image">




        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

            <div class="top-left links">
                <a href="{{ url('/') }}" class="navbar_style yoga_style top_left">Yoga Tracker</a>
            </div>
            <div class="top-right links">
                @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('admin.login') }}" class="navbar_style">Login</a>
                <a href="{{ route('trainee.register') }}"class="navbar_style">Register</a>
                @endif
            </div>
            @endif
        </div>

        <!-- <div class="row" style="margin-left:30px; margin-top:30px;">
        @if(session('success'))
        <div style="font-color:black;">
        {{session('success')}}
    </div>
    @endif
</div>
</div> -->

<!-- <div class="content">
<div class="title m-b-md">
<h3 style="font-family:Abril Fatface">Yoga Tracker</h3>
</div>
</div> -->

@yield('content')

</div>

</div>
</body>
</html>
