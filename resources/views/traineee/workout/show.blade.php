@extends('traineee.layout.app')

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
        <div class="box">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">Workouts</h3> -->

                <a href=" {{ route('workout.create')}}" class="btn btn-success col-lg-offset-5 pull-left"> Add New Workout</a>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body">
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
                                        <th data-hide="phone,tablet">Edit</th>
                                        <th data-hide="phone,tablet">Delete</th>
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
                                        <td><a href="{{route('workout.edit', $workout->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td>
                                            <form id="delete-form-{{$workout->id}}" class="" style="display:none" action="{{route('workout.destroy', $workout->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <a href="" onclick="
                                            if(confirm('Are you sure, You want to Delete this'))
                                            {
                                                event.preventDefault(); document.getElementById('delete-form-{{$workout->id}}').submit();}
                                                else
                                                {
                                                    event.preventDefault();
                                                }
                                                "><span class="glyphicon glyphicon-trash"></span></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

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
