@extends('admin.layout.app')


@section('scripts')


@endsection

@section('main-content')

<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="container">
                    <div class="row" id="ss">
                        <div class="col-md-8 col-md-offset-2" style="    " >
                            <div class="panel panel-default" style="    width: 93%;
                            height: 380px;">

                            <!-- Change password view code starts here || by jatin -->
                            <div class="panel-heading" style="  text-align: center;  background-color: #f5f5f5;
                            border-color: #ddd;
                            ">Change Password </div>
                            <div class="panel-body">

                                <!-- Depending on the session set in the UpdateController display the appropriate message -->
                                @if (Session::has('success'))
                                <div class="alert alert-success">{!! Session::get('success') !!}</div>
                                @endif
                                @if (Session::has('failure'))
                                <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                                @endif

                                <form action="{{route('adminchangepassword')}}" method="post" role="form" class="form-horizontal">


                                    {{csrf_field()}}
                                    <input type="hidden" name="name" value="{{ Auth::guard('admin')->user()->name }}" >


                                    <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">

                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <label for="password" id="lable">Old Password</label>
                                                <input id="password" type="password"  name="old" >
                                                @if ($errors->has('old'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        <!-- <label for="password" class="col-md-4 control-label">Old Password</label>

                                        <div class="col-md-6">
                                        <input id="password" type="password"  name="old">

                                        @if ($errors->has('old'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                    @endif
                                -->

                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label for="password" id="lable">New Password</label>
                                        <input id="password" type="password"  name="password" >
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <label for="password-confirm" id="lable">Confirm Password</label>
                                    <input id="password-confirm" type="password"  name="password_confirmation" >
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-success " id="sub">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Change password view code ends here || by jatin -->

            </div>
        </div>
    </div>
</div>

</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
</div>

@endsection
