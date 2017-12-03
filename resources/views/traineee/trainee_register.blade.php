@extends('layouts.login_register_common2')

@section('content')
<div class="appointment-w3" style="opacity:0.8;">
    <form action="{{ route('trainee.registered')}}" method="post">
        {{ csrf_field() }}

        <h3 class="header-w3ls reg" style="margin-top:-20px;">
            Registration Form</h3>
            <br>
            <div class="form-control-w3l">
                <input type="text" id="name" name="name" placeholder="Please enter your name">
            </div>
            <div class="form-control-w3l">

                <input type="email" id="email" name="email" placeholder="Please enter a valid email" title="" >
            </div>

            <div class="form-control-w3l">

                <input type="password" id="password" name="password" placeholder="Please enter password">
            </div>

            <div class="form-control-w3l">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Please confirm your password" >
            </div>
            <input type="submit" value="Register">
        </form>
    </div>



    @endsection
