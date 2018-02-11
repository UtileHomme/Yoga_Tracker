<!-- This is the trainee dashboard -->

@extends('trainer.layout.app')

@section('main-content')

<head>

    <style media="screen">

    .users-list>li img
    {
        max-width: 121px;
        height: 121px;
    }
    </style>

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Welcome to your dashboard!! You are Logged in as Trainer!!
            <small></small>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <section class="content">

        @if($trainee_count>0)
        <div class="col-md-12">
            <!-- USERS LIST -->
            <div class="box ">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Your Current Trainees</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">

                        @foreach($trainee_details as $detail)
                        <li>
                            <img src="{{ asset(Storage::disk('local')->url($detail->profile_image)) }}" alt="User Image">
                            <a class="users-list-name" href="#">{{$detail->trainee_name}}</a>
                            <span class="users-list-date">{{$detail->created_at}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>

        @else
        <p>You currently don't have any Trainees under you</p>
        @endif
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

@section('scripts')
@endsection
