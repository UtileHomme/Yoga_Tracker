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
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="#">Examples</a></li>
<li class="active">View Workout</li>
</ol>
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
            <th>Workout Name</th>
            <th>Workout Start date</th>
            <th>Workout Start Time</th>
            <th>Workout End Time</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>

              @foreach($trainee_workouts as $workout)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$workout->workout_name}}</td>
      <td>{{$workout->workout_date}}</td>
      <td>{{$workout->workout_start_time}}</td>
      <td>{{$workout->workout_end_time}}</td>
      <td><a href=""><span class="glyphicon glyphicon-edit"></span></a></td>
      <td><span class="glyphicon glyphicon-trash"></span></a></td>
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
