<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Hello {{Auth::user()->name}}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row align">

            <div class="block">
                <div class="info-box " >
                    <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hours Logged In Today</span>
                        <span class="info-box-number">2</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="block">
                <div class="info-box ">
                    <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hours Logged In This Week</span>
                        <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="block">
                <div class="info-box ">
                    <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hours Logged In This Year</span>
                        <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection
