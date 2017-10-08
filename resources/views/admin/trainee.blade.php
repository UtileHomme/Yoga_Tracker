<!-- This view shows up after the person has successfully logged in -->

<!DOCTYPE html>
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
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/fonts.css" rel="stylesheet">
    <link href="../css/panel.css" rel="stylesheet">

    <style media="screen">
    body
    {
        background-color: #283747 ;
    }
    #dash
    {
        position: relative;
        top:50%;
    }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-fixed-top navbar-custom ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand " href="{{ url('/') }}" style="margin-left: -140px;">
                        <div class="yoga_tracker">
                            <strong>{{ config('app.name', 'Yoga Tracker') }}</strong>
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ route('admin.login') }}" >Login</a></li>
                        <li style="margin-right: -204px;"><a href="{{ route('trainee.register') }}" >Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-right:-140px;" id="login_name">
                            <span class="login_name" ><strong>{{ Auth::user()->name }} </span> <span class="caret"></span> </strong>
                            </a>

                            <ul class="dropdown-menu" role="menu" style="margin-right: -160px; margin-left: 21px;">
                                <li >
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="padding-top:60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" >
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="" >
                            <h4 style="float:left"><span id="dash">Welcome!</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">

                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged Today</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">

                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged this Week</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">


                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged this Month</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="../js/jquery.js"> </script>
<script type="text/javascript" src="../js/login_name_hover_color.js"> </script>
</body>
</html>
