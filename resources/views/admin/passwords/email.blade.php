<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Yoga Tracking Website') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/yoga_awesome.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="images/favicon/yoga_awesome.png">

    <link rel="stylesheet" type="text/css" href="css/plugin.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">



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
    /*--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    --*/


    h1,h2,h3,h4,h5{
        font-family: 'Acme', sans-serif;
    }
    h1 {
        font-size: 4em;
        text-align: center;
        color: #fff;
        font-weight: 500;
        margin-bottom: 0.5em;
        letter-spacing: 7px;
    }

    .login-form h2{
        font-size: 2.2em;
        color: #fff;
        text-align: center;
        margin-bottom: 1.5em;
        line-height: 0.7em;

        font-weight: 100;
        letter-spacing: 2px;
    }
    /*-- main --*/
    .main {
        padding: 3em 0 0;
        margin-top:-50px;
        text-align: center;
    }
    .main-w3lsrow {
        margin: 0 auto;
        background:rgba(0, 0, 10, 0.66);
        width:25%;
        padding:2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        outline: none;
        font-size: 1em;
        color: #fff;
        padding: .6em 1em;
        margin: 0;
        width: 124%;
        border: none;
        border: 1px solid rgb(255, 255, 255);
        -webkit-appearance: none;
        display: block;
        background: transparent;
    }
    .login-form p {
        font-size: 0.9em;
        color: #fff;
        margin: 1.5em 0 .8em;
        font-weight: 200;
        letter-spacing: 6px;
        text-align: left;
    }
    /*-- checkbox --*/
    .anim {
        font-size: 0.9em;
        color: #fff;
        cursor: pointer;
        position: relative;
        margin: 2em 0 0;
        font-weight: 100;
        display: inline-block;
        letter-spacing: 3px;
    }
    input.checkbox {
        background: #fe7902;
        cursor: pointer;
        vertical-align: top;
        margin: 1px 8px 0 0;
    }
    input.checkbox:before {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        background: inherit;
    }
    input.checkbox:after {
        content: "";
        position: absolute;
        top: 1px;
        left: 0;
        z-index: 1;
        width: 14px;
        height: 14px;
        background: #fff;
        border: 2px solid #fff;
        -webkit-transition: .4s all;
        -moz-transition: .4s all;
        -o-transition: .4s all;
        -ms-transition: .4s all;
        transition: .4s all;
    }
    input.checkbox:checked:after {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
        border-color: #fff;
        border-top-color: transparent;
        border-right-color: transparent;
        background: transparent;
        top: 4px;
        left: 3px;
        width: 9px;
        height: 3px;
    }
    @keyframes rippling {
        50% {
            border-left-color: #8a2ce2;
        }
        100% {
            border-bottom-color: #8a2ce2;
            border-left-color: #8a2ce2;
        }
    }
    /*-- social-icons --*/
    .social_icons.agileinfo {
        margin: 6% 0% 5%;
    }
    ul.top-links li {
        margin-left:5px;
        display:inline-block;
    }
    ul.top-links li a i.fa {
        color: #000;
        background-color: #fff;
        width: 37px;
        height: 37px;
        font-size: 20px;
        border:1px solid #fff;
        line-height: 36px;
        text-align: center;
        text-decoration: none;
        transition:all 0.5s ease-in-out;
        -webkit-transition:all 0.5s ease-in-out;
        -moz-transition:all 0.5s ease-in-out;
        -o-transition:all 0.5s ease-in-out;
        -ms-transition:all 0.5s ease-in-out;
    }
    .top-links li a i.fa-facebook:hover {
        color: #fff;
        background-color: #46629E;
    }
    .top-links li a i.fa-google-plus:hover {
        color: #fff;
        background-color: #DD4B39;
    }
    /*--placeholder-color--*/

    ::-webkit-input-placeholder{
        color:rgba(255, 255, 255, 0.65);
    }

    :-moz-placeholder { /* Firefox 18- */
        color: rgba(255, 255, 255, 0.65);
    }

    ::-moz-placeholder {  /* Firefox 19+ */
        color: rgba(255, 255, 255, 0.65);
    }

    :-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.65);
    }
    /*--//placeholder-color--*/
    /*-- //checkbox --*/
    .login-form input[type="submit"] {
        font-size: 1em;
        color: #ffffff;
        background: #fe7902;
        border: 1px solid #fe7902;
        outline: none;
        cursor: pointer;
        padding: .6em 1em;
        -webkit-appearance: none;
        width: 100%;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        -o-border-radius: 2px;
        border-radius: 2px;
        margin-top: 2em;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        -ms-transition: 0.5s all;
    }
    .login-form input[type="submit"]:hover {
        background: transparent;
        color: #fff;
    }
    .login-agileits-bottom {
        margin-top:1.6em;
        text-align: center;
    }
    .login-agileits-bottom1 {
        margin-top: 1.6em;
        text-align: center;
    }
    .login-agileits-bottom1 h3 {
        color: #fff;
        font-size: 1em;
    }
    .login-agileits-bottom h6 {
        font-size: 1em;
        font-weight: 200;
        letter-spacing: 5px;
    }
    .login-agileits-bottom h6 a {
        color: #fff;
        transition: 0.5s all ;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        -ms-transition: 0.5s all;
    }
    .login-agileits-bottom h6 a:hover{
        color: #fe7902;
    }

    .home-section {
    height: 100%;
}

    .home-section-background {
        position: relative;
        height: 100%;
        background: url(../images/yogaimages/yoga11.jpg);
        background-position: center center;
        background-repeat:  no-repeat;
        background-attachment: fixed;
        background-size:  cover;
        z-index: 1;
    }
    /*-- //copyright --*/
    /*-- responsive-design --*/
    @media(min-width:1280px){
        .main-w3lsrow {
            width: 30%;
        }
    }
    @media(max-width:1080px){
        .main {
            padding: 1em 0 0;
        }
        .main-w3lsrow {
            width: 37%;
        }
    }
    @media(max-width:991px){
        .main {
            padding: 3em 0 0;
        }
    }
    /*@media(max-width:800px){
    .login-form input[type="email"], .login-form input[type="password"] {
    width: 90%;
}
.login-agileits-bottom h6 {
letter-spacing: 3px;
}
.login-form h2{
font-size: 2em;
margin-bottom: 1.2em;
}
.main-w3lsrow {
width: 44%;
}
}*/
@media(max-width:768px){
    .main {
        padding: 3em 0 0;
    }
    h1 {
        font-size: 3.5em;
    }
}
@media(max-width:736px){
    .main-w3lsrow {
        width: 50%;
    }
}
@media(max-width:667px){
    .main-w3lsrow {
        width: 56%;
    }
    h1 {
        font-size: 3em;
    }
}
@media(max-width:640px){
    h1 {
        font-size: 2.4em;
    }
    .login-form input[type="submit"] {
        margin-top: 1.5em;
    }
    .main {
        padding: 3em 0 0;
    }
}
@media(max-width:568px){
    .login-form input[type="email"],.login-form input[type="password"],.login-form input[type="submit"] {
        font-size: 0.9em;
        padding: .5em 0.8em;
    }
    .login-form p {
        font-size: 0.8em;
        margin:1.2em 0 .8em;
        letter-spacing: 4px;
    }
    h1 {
        font-size: 2.2em;
    }
    .login-form h2 {
        font-size: 1.8em;
        margin-bottom: 1em;
    }
    .copyright p {
        font-size: 0.9em;
        padding: 0 1em;
    }
    .login-agileits-bottom h6 {
        font-size: 0.9em;
        letter-spacing: 3px;
    }
}
@media(max-width:480px){
    h1 {
        font-size: 1.9em;
    }
    .main-w3lsrow {
        width: 63%;
    }
}
/*@media(max-width:414px){
h1 {
font-size: 1.8em;
}
.login-form h2 {
font-size: 1.4em;
margin-bottom: 3em;
}
.login-form p {
font-size: 0.75em;
margin: 2em 0 .2em;
letter-spacing: 2px;
}
.anim {
font-size: 0.75em;
}
.login-agileits-bottom {
margin-top: 2em;
}
.login-form input[type="email"], .login-form input[type="password"] {
width: 110%;
}

.form-layout
{
padding-right: 0px;
}
}
*/
@media(min-width:384px) and (max-width:640px){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        width: 74%;
    }
    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 100%;
    }

}

@media(min-width:320px) and (max-width:333px){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:75%;
        padding:2em;
        margin-left: 41px;
        margin-top:-33px;
    }


    .login-agileits-bottom h6  {
        font-size: 2em;
        font-weight: 200;
        letter-spacing: 5px;
    }

    ul.top-links li a i.fa {
        color: #000;
        background-color: #fff;
        width: 27px;
        height: 33px;
        font-size: 12px;
        border:1px solid #fff;
        line-height: 36px;
        text-align: center;
        text-decoration: none;
        transition:all 0.5s ease-in-out;
        -webkit-transition:all 0.5s ease-in-out;
        -moz-transition:all 0.5s ease-in-out;
        -o-transition:all 0.5s ease-in-out;
        -ms-transition:all 0.5s ease-in-out;
    }

    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 102%;
    }

    .form-layout
    {
        padding-right: 0px;
    }
}

@media(min-width:768px) and (max-width:1024px){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:75%;
        padding:2em;
        margin-left: 41px;
        margin-top:-33px;
    }


    .login-agileits-bottom h6  {
        font-size: 2em;
        font-weight: 200;
        letter-spacing: 5px;
    }

    ul.top-links li a i.fa {
        color: #000;
        background-color: #fff;
        width: 27px;
        height: 33px;
        font-size: 12px;
        border:1px solid #fff;
        line-height: 36px;
        text-align: center;
        text-decoration: none;
        transition:all 0.5s ease-in-out;
        -webkit-transition:all 0.5s ease-in-out;
        -moz-transition:all 0.5s ease-in-out;
        -o-transition:all 0.5s ease-in-out;
        -ms-transition:all 0.5s ease-in-out;
    }

    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 102%;
    }

    .form-layout
    {
        padding-right: 0px;
    }
}

@media(min-width:360px) and (max-width:383px){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:75%;
        padding:2em;
        margin-left: 41px;
        margin-top:-44px;
    }
    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 102%;
    }

    .form-layout
    {
        padding-right: 0px;
    }
}

@media screen only and (min-width:800px) {
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:175% !important;
        padding:2em;
        margin-left: 41px;
        margin-top:-44px;
    }
    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 135% !important;
    }

    .form-layout
    {
        padding-right: 0px;
    }
}

@media(min-width:600px) and (max-width:799px){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:50%;
        padding:2em;
        margin-left: 140px;
        margin-top:-100px;
    }
    .login-form h2 {
        font-size: 1.4em;
        margin-bottom: 3em;
    }
    .login-form p {
        font-size: 0.75em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 102% !important;
    }


    .form-layout
    {
        padding-right: 0px;
    }
}

@media(min-width:800px) and (max-width:1280px) and (orientation:portrait){
    h1 {
        font-size: 1.8em;
    }
    .main-w3lsrow {
        background:rgba(0, 0, 10, 0.66);
        width:74%;
        padding:113px;
        margin-left: 98px;
        margin-top:-108px;
    }
    ul.top-links li a i.fa {
        color: #000;
        background-color: #fff;
        width: 50px;
        height: 35px;
        font-size: 24px;
        border:1px solid #fff;
        line-height: 36px;
        text-align: center;
        text-decoration: none;
        transition:all 0.5s ease-in-out;
        -webkit-transition:all 0.5s ease-in-out;
        -moz-transition:all 0.5s ease-in-out;
        -o-transition:all 0.5s ease-in-out;
        -ms-transition:all 0.5s ease-in-out;
    }

    .login-f
    {
        font-size: 25px;
    }
    .login-form h2 {
        font-size: 2.0em;
        margin-bottom: 3em;
        margin-left: -85px;
    }
    .login-form p {
        font-size: 1.50em;
        margin: 2em 0 .2em;
        letter-spacing: 2px;
        margin-left: -11px;
    }
    .anim {
        font-size: 0.75em;
    }
    .login-agileits-bottom {
        margin-top: 2em;
    }
    .login-form input[type="email"], .login-form input[type="password"] {
        width: 167% !important;
        margin-left: -9px;
    }
    .login-form input[type="submit"]
    {
        width: 88% !important;
        margin-left: -65px;
    }
    .agile-row
    {
        width:129%
    }

    .login-agileits-bottom h6  {
        font-size: 2em;
        font-weight: 200;
        letter-spacing: 5px;
    }

    .login-agileits-bottom1 h3
    {
        font-size: 2em;
        font-weight: 200;
        letter-spacing: 5px;
    }

    .form-layout
    {
        padding-right: 0px;
    }
}
@media only screen and (max-width:320px) and (max-device-width : 480px){
    h1 {
        font-size: 1.6em;
    }
    .login-form input[type="email"], .login-form input[type="password"], .login-form input[type="submit"] {
        font-size: 0.8em;
        padding: .5em 0.8em;
    }
    .login-form p {
        font-size: 0.7em;
    }
    .anim {
        font-size: 0.7em;
        margin: 1em 0 0;
        letter-spacing: 1px;
    }
    input.checkbox:before {
        width: 15px;
        height: 14px;
    }
    input.checkbox:after {
        width: 11px;
        height: 8px;
    }
    input.checkbox:checked:after {
        top: 3px;
        left: 2px;
        width: 7px;
        height: 2px;
    }
    .login-agileits-bottom h6 {
        font-size: 0.75em;
        letter-spacing: 2px;
    }
    .login-agileits-bottom {
        margin-top: 0.8em;
    }
    .login-form h2 {
        font-size: 1.2em;
    }
    .copyright p {
        font-size: 0.8em;
    }
    .main {
        padding: 2em 0 0;
    }
    .copyright {
        padding: 1.4em 0 1em;
    }
    h1 {
        letter-spacing: 5px;
    }
}
/*-- //responsive-design --*/

</style>
</head>
<body>

    @include('partial/_message')
    @include('partial/_errors')

    <header id="home" class="home-section">

        <div class="header-top-area">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="{{url('/')}}">Yoga Tracker</a>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="navigation-menu">
                            <div class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a class="smoth-scroll" href="{{ route('admin.login') }}">Login</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="{{ route('trainee.register') }}">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-section-background" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center form-layout">

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


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>



</div>
</body>
</html>
