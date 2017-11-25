@extends('traineee.layout.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Your Workout Log Here
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.trainee')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Workout</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Workout Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="wname">Workout Name</label>
                                <input type="text" class="form-control" id="wname" name="wname" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="wdate">Workout Date</label>
                                <input type="text" class="form-control" id="wdate" name="wdate" placeholder="Workout Date">
                            </div>

                            <div class="form-group">
                                <label for="wstime">Workout Start Time</label>
                                <input type="text" class="form-control" id="wstime" name="wstime" placeholder="Start Time">
                            </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="wetime">Workout End Time</label>
                                    <input type="text" class="form-control" id="wetime" name="wetime" placeholder="End Time">
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> Comments
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form>
                                    <textarea class="textarea" placeholder="Place some text here" name="body"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

@endsection
