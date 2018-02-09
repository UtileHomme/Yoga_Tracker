<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')

<head>
    <style media="screen">

    .content-wrapper
    {
        background-color: #F4F1EA;
    }
</style>

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Welcome to your dashboard
            <small></small>
        </h1>

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
                                                <span class="username"><a href="">{{$trainee_names_all[$i]}}</a></span>
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

                                                <?php
                                                $flag=0;
                                                for($z=0;$z<$trainee_likes_all;$z++)
                                                {

                                                    if($trainee_names_likes[$z]['like_status']==1 && $trainee_names_likes[$z]['trainee_name']==$logged_in_user  && $trainee_names_likes[$z]['workout_id']==$trainee_workouts_all[$i]['id'])
                                                    {
                                                        $flag = 1;
                                                        break;
                                                    }
                                                    else
                                                    {
                                                        $flag=0;
                                                    }
                                                }
                                                        ?>

                                                        <?php

                                                        if($flag==1)
                                                        {
                                                         ?>
                                                        <button type="button" class="{{$trainee_workouts_all[$i]['id']}} likeall {{$trainee_workouts_all[$i]['id']}}likestatusall btn btn-default btn-xs likecolourchangeall" style="background-color: #AAAACA; border-color:black;">
                                                            <i class="fa fa-thumbs-o-up {{$trainee_workouts_all[$i]['id']}}likecolourall" ></i> Like</button>
                                                            <?php
                                                        }
                                                        else
                                                        {

                                                            ?>
                                                            <button type="button" class="{{$trainee_workouts_all[$i]['id']}} likeall {{$trainee_workouts_all[$i]['id']}}likestatusall btn btn-default btn-xs">
                                                                <i class="fa fa-thumbs-o-up {{$trainee_workouts_all[$i]['id']}}likecolourall"></i> Like</button>
                                                                <?php
                                                            }

                                                        ?>
                                                        <span class="pull-right text-muted">

                                                            <div class="updatelikesall{{$trainee_workouts_all[$i]['id']}} reducelikesall{{$trainee_workouts_all[$i]['id']}} reducelikeshowall{{$trainee_workouts_all[$i]['id']}} updatelikeshowall{{$trainee_workouts_all[$i]['id']}}" style="float:left">

                                                                {{$likes_all[$i]}}@if($likes_all[$i]==1)
                                                                like
                                                                @else
                                                                likes
                                                                @endif -
                                                            </div>
                                                            <div class="commentcountall{{$trainee_workouts_all[$i]['id']}}" style="float:left">
                                                                {{$counts_all[$i]}}

                                                                @if($counts_all[$i]==1)
                                                                comment
                                                                @else
                                                                comments
                                                                @endif
                                                            </div>
                                                        </span>
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
                                                                <input type="text" class="form-control input-sm textcomment1" placeholder="Please post you comment here" id="{{$trainee_workouts_all[$i]['id']}}comall">
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
                                                            <?php
                                                            $flag=0;
                                                            for($z=0;$z<$trainee_likes;$z++)
                                                            {

                                                                if($trainee_names_likes_single[$z]['like_status']==1 && $trainee_names_likes_single[$z]['trainee_name']==$logged_in_user && $trainee_names_likes_single[$z]['workout_id']==$trainee_workouts[$i]['id'])
                                                                {
                                                                    $flag = 1;
                                                                    break;
                                                                }
                                                                else
                                                                {
                                                                    $flag=0;
                                                                }
                                                            }
                                                            // $z=$trainee_likes-1;
                                                            ?>

                                                            <?php
                                                            if($flag == 1)
                                                            {
                                                                ?>
                                                                <button type="button" class="{{$trainee_workouts[$i]['id']}} like {{$trainee_workouts[$i]['id']}}likestatus btn btn-default btn-xs likecolourchange" style="background-color: #AAAACA; border-color:black;">
                                                                    <i class="fa fa-thumbs-o-up {{$trainee_workouts[$i]['id']}}likecolour"></i> Like</button>
                                                                    <?php
                                                                }
                                                                else
                                                                {

                                                                    ?>
                                                                    <button type="button" class="{{$trainee_workouts[$i]['id']}} like {{$trainee_workouts[$i]['id']}}likestatus btn btn-default btn-xs">
                                                                        <i class="fa fa-thumbs-o-up {{$trainee_workouts[$i]['id']}}likecolour"></i> Like</button>
                                                                        <?php
                                                                    }

                                                                    ?>



                                                                    <span class="pull-right text-muted">
                                                                        <div class="updatelikes{{$trainee_workouts[$i]['id']}} reducelikes{{$trainee_workouts[$i]['id']}} updatelikeshow{{$trainee_workouts[$i]['id']}} reducelikeshowall{{$trainee_workouts[$i]['id']}}" style="float:left">

                                                                            {{$likes[$i]}}

                                                                            @if($likes[$i]==1)
                                                                            like
                                                                            @else
                                                                            likes
                                                                            @endif -
                                                                        </div>

                                                                        <div class="commentcount{{$trainee_workouts[$i]['id']}}" style="float:left">
                                                                            {{$counts[$i]}}

                                                                            @if($counts[$i]==1)
                                                                            comment
                                                                            @else
                                                                            comments
                                                                            @endif
                                                                        </div>
                                                                    </span>
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
                                                                    <form action="" method="post" class= formid">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="workout_number" value="">
                                                                        <img class="img-responsive img-circle img-sm" src="{{ asset(Storage::disk('local')->url($trainee_image)) }} " alt="Alt Text">
                                                                        <!-- .img-push is used to add margin to elements next to floating images -->
                                                                        <div class="img-push">
                                                                            <input type="text" class="{{$trainee_workouts[$i]['id']}} form-control input-sm textcomment" placeholder="Please post you comment here" id="{{$trainee_workouts[$i]['id']}}com">
                                                                            <p style="color:red" class="{{$trainee_workouts[$i]['id']}}error errors">Enter Key is disabled!! Please click the button</p>
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
                        $(".errors").hide();

                    $('.textcomment').on('keyup keypress', function(e) {

                        var post_class= $(this).attr("class");
                        console.log(post_class);
                        var post_class_array=post_class.split(" ");
                        console.log(post_class_array);
                        var post_id = post_class_array[0];
                        console.log(post_id);


                        var keyCode = e.keyCode || e.which;
                        if (keyCode === 13) {
                            e.preventDefault();
                            $(post_id+".error").show();
                            return false;

                        }
                        else
                    {
                        $(post_id+".error").hide();
                    }
                    });

                    $(".submit").click(function(){
                        var post_class= $(this).attr("class");
                        // console.log(post_class);
                        var post_class_array=post_class.split(" ");
                        console.log(post_class_array);
                        var post_id = post_class_array[0];
                        var comment=$("#"+post_id+"com").val();

                        $("#"+post_id+"com").val('');
                        $("#"+post_id+"com").attr("placeholder", "Please post your comment here");
                        // console.log(comment);
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
                        $.get("{{ URL::to('updatecommentcount') }}",{ comment3 : comment,id: post_id, }
                        ,function(data){

                            $('.commentcount'+post_id).html(data);
                            $('.commentcountall'+post_id).html(data);

                        });

                        $(".error").hide();
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
                        var comment2=$("#"+post_id2+"comall").val();
                        console.log(comment2);
                        $("#"+post_id2+"comall").val('');
                        $("#"+post_id2+"comall").attr("placeholder", "Please post your comment here");

                        $.get("{{ URL::to('addcommentall') }}",{ comment2 : comment2,id2: post_id2, }
                        ,function(data){
                            $('.commentsall'+post_id2).html(data);
                            $('.comment'+post_id2).html(data);
                        });

                        $.get("{{ URL::to('updatecommentcountall') }}",{ comment3 : comment2,id: post_id2, }
                        ,function(data){

                            $('.commentcountall'+post_id2).html(data);
                            $('.commentcount'+post_id2).html(data);

                        });

                    });

                    $(".like").click(function(){

                        if($(this).hasClass('likecolourchange'))
                        {
                            console.log('has colour');
                            var like_class= $(this).attr("class");
                            var like_class_array = like_class.split(" ");
                            // console.log(like_class_array);
                            var post_id = like_class_array[0];
                            console.log(post_id);

                            $.get("{{ URL::to('reducelikes') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikes'+post_id).html(data);
                                $('.'+post_id+'likestatus').removeClass("likecolourchange");
                                $('.'+post_id+'likestatus').css('background-color', '#f4f4f4');
                                $('.'+post_id+'likestatus').css('border-color', '#ddd');
                                $('.'+post_id+'likestatusall').removeClass("likecolourchangeall");
                                $('.'+post_id+'likestatusall').css('background-color', '#f4f4f4');
                                $('.'+post_id+'likestatusall').css('border-color', '#ddd');
                                $('.reducelikeshowall'+post_id).html(data);
                            });

                            $.get("{{ URL::to('reducelikeshowall') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikeshowall'+post_id).html(data);

                                });

                        }
                        else
                        {
                            console.log('has no colour');

                            var like_class= $(this).attr("class");
                            var like_class_array = like_class.split(" ");
                            // console.log(like_class_array);
                            var post_id = like_class_array[0];

                            $.get("{{ URL::to('updatelikes') }}",{id: post_id}
                            ,function(data){
                                $('.updatelikes'+post_id).html(data);
                                $('.'+post_id+'likestatus').addClass("likecolourchange");
                                $('.'+post_id+'likestatus').css('background-color', '#AAAACA');
                                $('.'+post_id+'likestatus').css('border-color', 'black');
                                $('.'+post_id+'likestatusall').addClass("likecolourchangeall");
                                $('.'+post_id+'likestatusall').css('background-color', '#AAAACA');
                                $('.'+post_id+'likestatusall').css('border-color', 'black');
                                $('.reducelikeshowall'+post_id).html(data);
                            });

                            $.get("{{ URL::to('reducelikeshowall') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikeshowall'+post_id).html(data);

                                });
                        }
                    });

                    $(".likeall").click(function(){
                        console.log('like all clicked');
                        if($(this).hasClass('likecolourchangeall'))
                        {
                            console.log('like has colour');

                            var like_class= $(this).attr("class");
                            var like_class_array = like_class.split(" ");
                            // console.log(like_class_array);
                            var post_id = like_class_array[0];
                            console.log(post_id)
                            $.get("{{ URL::to('reducelikesall') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikesall'+post_id).html(data);
                                $('.'+post_id+'likestatusall').removeClass("likecolourchangeall");
                                $('.'+post_id+'likestatusall').css('background-color', '#f4f4f4');
                                $('.'+post_id+'likestatusall').css('border-color', '#ddd');
                                $('.'+post_id+'likestatus').removeClass("likecolourchange");
                                $('.'+post_id+'likestatus').css('background-color', '#f4f4f4');
                                $('.'+post_id+'likestatus').css('border-color', '#ddd');
                                $('.reducelikeshowall'+post_id).html(data);
                            });

                            $.get("{{ URL::to('reducelikeshowall') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikeshowall'+post_id).html(data);

                                });

                            // $('.'+post_id+'likestatus').attr("disabled", true);
                        }
                        else
                        {
                            console.log('like doesnt have colour');

                            var like_class= $(this).attr("class");
                            var like_class_array = like_class.split(" ");
                            // console.log(like_class_array);
                            var post_id = like_class_array[0];
                            console.log(post_id)
                            $.get("{{ URL::to('updatelikesall') }}",{id: post_id}
                            ,function(data){
                                $('.updatelikesall'+post_id).html(data);
                                $('.'+post_id+'likestatusall').addClass("likecolourchangeall");
                                $('.'+post_id+'likestatusall').css('background-color', '#AAAACA');
                                $('.'+post_id+'likestatusall').css('border-color', 'black');
                                $('.'+post_id+'likestatus').addClass("likecolourchange");
                                $('.'+post_id+'likestatus').css('background-color', '#AAAACA');
                                $('.'+post_id+'likestatus').css('border-color', 'black');
                                $('.reducelikeshowall'+post_id).html(data);

                            });

                            $.get("{{ URL::to('reducelikeshowall') }}",{id: post_id}
                            ,function(data){
                                $('.reducelikeshowall'+post_id).html(data);

                                });
                        }
                    });

                });
                </script>

                @endsection
