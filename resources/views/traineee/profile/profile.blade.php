<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')

<head>

<style media="screen">

.alert-success
{
    color: #3c763d !important;
    background-color: #dff0d8 !important;
    border-color: #d6e9c6 !important;

}

.alert
{
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.modal-content2
{
    height: 52px !important;
    margin-top: 87% !important;

    border-radius: 7px;
}
}
</style>

</head>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <a href="{{route('editprofile')}}" class="btn btn-success pull-right">Edit Profile</a>

    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
