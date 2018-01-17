<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Welcome to your dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- <h2 class="page-header">Your Feed</h2> -->

        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Friend's Activities</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Your Activities</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <!-- Box Comment -->
                                    <div class="box box-widget">
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                <img class="img-circle" src="{{asset('traineee/dist/img/user1-128x128.jpg')}}" alt="User Image">
                                                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                                <span class="description">Shared publicly - 7:30 PM Today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="box-tools">
                                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                                    <i class="fa fa-circle-o"></i></button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                                <!-- /.box-tools -->
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <img class="img-responsive pad" src="{{asset('traineee/dist/img/photo2.png')}}" alt="Photo">

                                                <p>I took this photo this morning. What do you guys think?</p>
                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                                <span class="pull-right text-muted">127 likes - 3 comments</span>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer box-comments">
                                                <div class="box-comment">
                                                    <!-- User image -->
                                                    <img class="img-circle img-sm" src="{{asset('traineee/dist/img/user3-128x128.jpg')}}" alt="User Image">

                                                    <div class="comment-text">
                                                        <span class="username">
                                                            Maria Gonzales
                                                            <span class="text-muted pull-right">8:03 PM Today</span>
                                                        </span><!-- /.username -->
                                                        It is a long established fact that a reader will be distracted
                                                        by the readable content of a page when looking at its layout.
                                                    </div>
                                                    <!-- /.comment-text -->
                                                </div>
                                                <!-- /.box-comment -->
                                                <div class="box-comment">
                                                    <!-- User image -->
                                                    <img class="img-circle img-sm" src="{{asset('traineee/dist/img/user4-128x128.jpg')}}" alt="User Image">

                                                    <div class="comment-text">
                                                        <span class="username">
                                                            Luna Stark
                                                            <span class="text-muted pull-right">8:03 PM Today</span>
                                                        </span><!-- /.username -->
                                                        It is a long established fact that a reader will be distracted
                                                        by the readable content of a page when looking at its layout.
                                                    </div>
                                                    <!-- /.comment-text -->
                                                </div>
                                                <!-- /.box-comment -->
                                            </div>
                                            <!-- /.box-footer -->
                                            <div class="box-footer">
                                                <form action="#" method="post">
                                                    <img class="img-responsive img-circle img-sm" src="{{asset('traineee/dist/img/user4-128x128.jpg')}}" alt="Alt Text">
                                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                                    <div class="img-push">
                                                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.box-footer -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">

                                <div class="row">
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3 class="counter-count text-center">150</h3>

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
                                                <h3 class="counter-count text-center">150</h3>

                                                <p class="text-center">Hours Logged in This Week</p>
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
                                                <h3 class="counter-count text-center">150</h3>

                                                <p class="text-center">Hours Logged in This Month</p>
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
                                                <h3 class="counter-count text-center">150</h3>

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

                                @for($i=0;$i<$trainee_workout_count;$i++)
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2">
                                        <!-- Box Comment -->
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                <div class="user-block">
                                                    <img class="img-circle" src="{{ asset(Storage::disk('local')->url($trainee_image)) }}" alt="User Image">
                                                    <span class="username"><a href="#">{{Auth::user()->name}}</a></span>
                                                    <span class="description"> {{$trainee_workouts[$i]['workout_start_time']}} {{$trainee_workouts[$i]['workout_start_timeofday']}} </span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                                        <i class="fa fa-circle-o"></i></button>
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <img class="img-responsive pad" src="{{asset('traineee/dist/img/photo2.png')}}" alt="Photo">

                                                    <p>{{$trainee_workouts[$i]['comments']}}</p>
                                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                                    <span class="pull-right text-muted">{{$likes[$i]}}@if($likes[$i]==1)
                                                    like
                                                    @else
                                                    likes
                                                    @endif - {{$counts[$i]}}

                                                        @if($counts[$i]==1)
                                                        comment
                                                        @else
                                                        comments
                                                        @endif</span>
                                                </div>
                                                <!-- /.box-body -->
                                                @if($counts[$i]>0)
                                                <div class="box-footer box-comments">

                                                    @for($j=0;$j<$counts[$i];$j++)
                                                    <div class="box-comment">
                                                        <!-- User image -->
                                                        <img class="img-circle img-sm" src="{{asset('traineee/dist/img/user3-128x128.jpg')}}" alt="User Image">


                                                        <div class="comment-text">
                                                            <span class="username">
                                                                {{$name[$i][$j]['trainee_name']}}
                                                                <span class="text-muted pull-right">{{$time[$i][$j]['created_at']}}</span>
                                                            </span><!-- /.username -->
                                                            {{$comments[$i][$j]['comment']}}
                                                        </div>
                                                        <!-- /.comment-text -->
                                                    </div>
                                                    @endfor
                                                    <!-- /.box-comment -->
                                                    <!-- /.box-comment -->
                                                </div>
                                                @endif
                                                <!-- /.box-footer -->
                                                <div class="box-footer">
                                                    <form action="#" method="post">
                                                        <img class="img-responsive img-circle img-sm" src="{{ asset(Storage::disk('local')->url($trainee_image)) }} " alt="Alt Text">
                                                        <!-- .img-push is used to add margin to elements next to floating images -->
                                                        <div class="img-push">
                                                            <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.box-footer -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                        <!-- /.col -->
                                    </div>
                                    @endfor
                                    <!-- /.row -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection
