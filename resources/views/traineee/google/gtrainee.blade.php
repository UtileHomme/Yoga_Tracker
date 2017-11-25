<!-- This is the trainee dashboard -->


<!-- This is the trainee dashboard -->

@extends('traineee.google.gapp')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Blank page
<small>it all starts here</small>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('home', ['name' => $logged_in_user]) }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Blank page</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Hours Logged will be displayed here</h3>

<div class="box-tools pull-right">
  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
    <i class="fa fa-minus"></i></button>
  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    <i class="fa fa-times"></i></button>
</div>
</div>
<div class="box-body">
Tabular representation of workout session for that particular trainee will come here
</div>
<!-- /.box-body -->
<div class="box-footer">



</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
