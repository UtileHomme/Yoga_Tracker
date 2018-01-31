<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Your Statistics
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- <h2 class="page-header">Your Feed</h2> -->

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 class="counter-count text-center">{{$total_hours_for_today}}</h3>

                                <p class="text-center">Hours Logged in Today</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 class="counter-count text-center">{{$total_hours_for_this_week}}</h3>

                                <p class="text-center">Hours Logged in a Week's Time</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3 class="counter-count text-center">{{$total_hours_for_this_month}}</h3>

                                <p class="text-center">Hours Logged in a Month's Time</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 class="counter-count text-center">{{$total_hours_for_this_year}}</h3>

                                <p class="text-center">Hours Logged in This Year</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div id="curve_chart" style="width: 900px; height: 500px"></div>
            </div>
            <!-- /.box-body -->
          </div>


        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

@section('scripts')


@endsection
