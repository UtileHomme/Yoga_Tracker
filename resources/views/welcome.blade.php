<!-- This is the home page of the website -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yoga Tracking Website</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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


            /*body
            {
                background-image:url(../images/yoga1.jpg);
                 background-color:  #8e8584  ;
                 background-repeat:no repeat;
                 background-size: cover;
                 background-blend-mode:screen;
            }*/


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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('admin.login') }}" style="font-family:Abril Fatface">Login</a>
                        <a href="{{ route('trainee.register') }}"style="font-family:Abril Fatface">Register</a>
                    @endif
                </div>
            @endif

            <div class="row" style="margin-left:30px; margin-top:30px;">
                @if(session('success'))
                <div style="font-color:black;">
                    {{session('success')}}
                </div>
                @endif
            </div>


            <div class="content">
                <div class="title m-b-md">
                    <h3 style="font-family:Abril Fatface">Yoga Tracker</h3>
                </div>
            </div>



        </div>
    </body>
</html>
