
@extends('trainer.layout.app')

@section('main-content')

@section('headSection')

<link rel="stylesheet" href="{{ asset('traineee/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}">

@endsection

@section('main-content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Workout Logs
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->

                <!-- /.box-body -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th data-hide="phone,tablet">Workout Name</th>
                                        <th data-hide="phone,tablet">Workout Start date</th>
                                        <th data-hide="phone,tablet">Workout Start Time</th>
                                        <th data-hide="phone,tablet">Workout End Time</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($trainee_workouts_show as $workout)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$workout->workout_name}}</td>
                                        <td>{{$workout->workout_date}}</td>
                                        <td>{{$workout->workout_start_time}}</td>
                                        <td>{{$workout->workout_end_time}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>


                        <!-- /.box-footer-->

                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('partial._message')
            @endsection

            @section('footerSection')

            <script type="text/javascript" src=" {{ asset('traineee/bower_components/datatables.net/js/jquery.dataTables.min.js')}}">

            </script>
            <script type="text/javascript" src=" {{ asset('traineee/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}">

            </script>

            <script>
            $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : false,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                })
            })
            </script>
            @endsection

            @endsection

            @section('scripts')

            @endsection
