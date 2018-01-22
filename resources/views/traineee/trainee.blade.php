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
                        <li class="active"><a href="#tab_1" data-toggle="tab">Everyone's Activities</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Your Activities</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            @for($i=0;$i<$trainee_workout_count_all;$i++)
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <!-- Box Comment -->
                                    <div class="box box-widget">
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                <img class="img-circle" src="{{ asset(Storage::disk('local')->url($trainee_images_all[$i])) }}" alt="User Image">
                                                <span class="username"><a href="#">{{$trainee_names_all[$i]}}</a></span>
                                                <span class="description"> {{$trainee_workouts_all[$i]['workout_start_time']}} {{$trainee_workouts_all[$i]['workout_start_timeofday']}} </span>
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

                                                @if($trainee_workouts_all[$i]['workout_image']!=NULL)
                                                <img class="img-responsive pad" src="{{ asset(Storage::disk('local')->url($trainee_workouts_all[$i]['workout_image'])) }}" alt="Photo" width="100%">
                                                @endif
                                                <p>{{$trainee_workouts_all[$i]['comments']}}</p>
                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                                <span class="pull-right text-muted">{{$likes_all[$i]}}@if($likes_all[$i]==1)
                                                    like
                                                    @else
                                                    likes
                                                    @endif - {{$counts_all[$i]}}

                                                    @if($counts_all[$i]==1)
                                                    comment
                                                    @else
                                                    comments
                                                    @endif</span>
                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer box-comments commentsall{{$trainee_workouts_all[$i]['id']}}">

                                                    @if($counts_all[$i]>0)


                                                    @for($j=0;$j<$counts_all[$i];$j++)
                                                    <div class="box-comment ">


                                                        <!-- User image -->
                                                        <img class="img-circle img-sm" src="{{asset(Storage::disk('local')->url($image_all[$i][$j]['trainee_image'])) }}" alt="User Image">


                                                        <div class="comment-text">
                                                            <span class="username">
                                                                {{$name_all[$i][$j]['trainee_name']}}
                                                                <span class="text-muted pull-right">{{$time_all[$i][$j]['created_at']}}</span>
                                                            </span><!-- /.username -->
                                                            {{$comments_all[$i][$j]['comment']}}
                                                        </div>
                                                        <!-- /.comment-text -->
                                                    </div>

                                                    @endfor
                                                    @endif
                                                </div>


                                                <!-- /.box-comment -->
                                                <!-- /.box-comment -->



                                                <!-- /.box-footer -->
                                                <div class="box-footer box-comment">
                                                    <form action="/index.html" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="workout_number" value="">
                                                        <img class="img-responsive img-circle img-sm" src="{{ asset(Storage::disk('local')->url($trainee_image)) }} " alt="Alt Text">
                                                        <!-- .img-push is used to add margin to elements next to floating images -->
                                                        <div class="img-push">
                                                            <input type="text" class="form-control input-sm textcomment1" placeholder="Please post you comment here" id="{{$trainee_workouts_all[$i]['id']}}">
                                                            <input type="button" name="" value="Post Comment" class="{{$trainee_workouts_all[$i]['id']}} submit1 btn btn-success btn-sm pull-right" style="margin-top:10px;">
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.box-footer -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.col -->
                                    @endfor
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">

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
                                                        @if($trainee_workouts[$i]['workout_image']!=NULL)
                                                        <img class="img-responsive pad" src="{{ asset(Storage::disk('local')->url($trainee_workouts[$i]['workout_image'])) }}" alt="Photo" width="100%">
                                                        @endif
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

                                                        <div class="box-footer box-comments comment{{$trainee_workouts[$i]['id']}}">

                                                            @if($counts[$i]>0)


                                                            @for($j=0;$j<$counts[$i];$j++)
                                                            <div class="box-comment ">


                                                                <!-- User image -->
                                                                <img class="img-circle img-sm" src="{{asset(Storage::disk('local')->url($image[$i][$j]['trainee_image'])) }}" alt="User Image">


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
                                                            @endif
                                                        </div>


                                                        <!-- /.box-comment -->
                                                        <!-- /.box-comment -->



                                                        <!-- /.box-footer -->
                                                        <div class="box-footer box-comment">
                                                            <form action="/index.html" method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="workout_number" value="">
                                                                <img class="img-responsive img-circle img-sm" src="{{ asset(Storage::disk('local')->url($trainee_image)) }} " alt="Alt Text">
                                                                <!-- .img-push is used to add margin to elements next to floating images -->
                                                                <div class="img-push">
                                                                    <input type="text" class="form-control input-sm textcomment" placeholder="Please post you comment here" id="{{$trainee_workouts[$i]['id']}}com">
                                                                    <input type="button" name="" value="Post Comment" class="{{$trainee_workouts[$i]['id']}} submit btn btn-success btn-sm pull-right" style="margin-top:10px;">
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.box-footer -->
                                                </div>
                                                <!-- /.box -->
                                            </div>
                                            <!-- /.col -->
                                            <!-- /.col -->
                                            @endfor
                                        </div>


                                        <!-- <div class="" id="backendcomments">

                                    </div> -->
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

        @section('scripts')

        <script type="text/javascript">

        $(document).ready(function() {
            // $('form').on('submit', function(e){
            //     e.preventDefault(); //1
            //
            //
            //
            //
            // });
            $(".submit").click(function(){
                var post_class= $(this).attr("class");
                // console.log(post_class);
                var post_class_array=post_class.split(" ");
                // console.log(post_class);
                var post_id = post_class_array[0];
                var comment=$("#"+post_id+"com").val();
                console.log(comment);

                //
                // $.ajax({
                //      type: "POST",
                //      url: 'addcomment',
                //
                //      data: {'comment1' : comment,'id': post_id,'_token':$('input[name=_token]').val() },
                //      success: function(data){
                //          $('.comments'+post_id).html(data);
                //      }
                //  });
                $.get("{{ URL::to('addcomment') }}",{ comment1 : comment,id: post_id, }
                ,function(data){
                    $('.comment'+post_id).html(data);
                    $('.commentsall'+post_id).html(data);
                });


            });


            // $('.textcomment').val(" ");
            // $(".textcomment").attr("placeholder","Please post your comment here");
            // });
            $(".submit1").click(function(){
    var post_class2= $(this).attr("class");
    var post_class_array2=post_class2.split(" ");
    // console.log(post_class_array[0]);
    var post_id2 = post_class_array2[0];
    // console.log(post_id);
    var comment2=$("#"+post_id2).val();
    console.log(comment2);

    $.get("{{ URL::to('addcommentall') }}",{ comment2 : comment2,id2: post_id2, }
    ,function(data){
        $('.commentsall'+post_id2).html(data);
                $('.comment'+post_id2).html(data);
    });


    });



        });
        </script>
        @endsection
