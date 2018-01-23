<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Workout;
use App\trainee_detail;
use App\workout_comment;
use App\Admin;
use Session;

class TraineeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('trainee',['except'=>'test']);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        // dd($trainee_id);


        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        //this part is for the logged in user's workouts
        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->orderBy('created_at','Desc')->get();
        $trainee_workout1 = DB::table('workouts')->where('trainee_id',$trainee_id)->get();
        $trainee_workouts = json_decode($trainee_workouts,true);

        $trainee_workout_count = count($trainee_workouts);

        // dd(Auth::user()->name);
//

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $trainee_workouts[$i]['workout_start_time'] = date("H:i",strtotime($trainee_workouts[$i]['workout_start_time']));
        }
        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $trainee_workouts[$i]['workout_end_time'] = date("H:i",strtotime($trainee_workouts[$i]['workout_end_time']));
        }




        $workout_id = array();

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $workout_id[] = $trainee_workouts[$i]['id'];
        }

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $likes_per_workout = DB::table('workouts')->where('id',$workout_id[$i])->value('likes_on_workout');

            if($likes_per_workout==0)
            {
                $likes_per_workout = 0;
            }
            $likes[] = $likes_per_workout;
        }

        // dd($workout_id);

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $comments_per_id = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
            $comments_per_id = json_decode($comments_per_id,true);
            $count_comments = count($comments_per_id);


            $comments[] = $comments_per_id;
            $counts[] = $count_comments;

            $name_per_comment = DB::table('workout_comments')->select('trainee_name')->where('workout_id',$workout_id[$i])->get();
            $name_per_comment = json_decode($name_per_comment,true);
            $name_count = count($name_per_comment);
            $name[] = $name_per_comment;

            $name_counts[] = $name_count;

            $time_per_comment = DB::table('workout_comments')->select('created_at')->where('workout_id',$workout_id[$i])->get();
            $time_per_comment = json_decode($time_per_comment,true);

            $time_count = count($time_per_comment);

            $time[] = $time_per_comment;

            $image_per_comment = DB::table('workout_comments')->select('trainee_image')->where('workout_id',$workout_id[$i])->get();
            $image_per_comment = json_decode($image_per_comment,true);

            $image_count = count($image_per_comment);

            $image[] = $image_per_comment;

            // $image_workouts = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
            // $image_workouts = json_decode($image_workouts);

         }
         // dd($comments);

         for($i=0;$i<$trainee_workout_count;$i++)
         {
             if($counts[$i]>0)
             {
                 for($j=0;$j<$counts[$i];$j++)
                 {
                     $time[$i][$j]['created_at'] = substr($time[$i][$j]['created_at'],11,5);
                     if(date($time[$i][$j]['created_at'])<12)
                     {
                         $time[$i][$j]['created_at'] = $time[$i][$j]['created_at']." AM";
                     }
                     else
                     {
                        $time[$i][$j]['created_at'] =  date('H:i', strtotime('-12 hour', strtotime($time[$i][$j]['created_at'])))." PM";
                     }


                 }
             }
         }
         // dd($time);
         //individual users workouts end here

         //friends activity starts here


         $trainee_workouts_all = DB::table('workouts')->orderBy('created_at','Desc')->get();
         $trainee_workouts_all = json_decode($trainee_workouts_all,true);
         $trainee_workout_count_all = count($trainee_workouts_all);
         // dd($trainee_workout_count_all);


         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $trainee_workouts_all[$i]['workout_start_time'] = date("H:i",strtotime($trainee_workouts_all[$i]['workout_start_time']));
         }
         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $trainee_workouts_all[$i]['workout_end_time'] = date("H:i",strtotime($trainee_workouts_all[$i]['workout_end_time']));
         }

         // dd($trainee_workouts_all);



         $workout_id_all = array();
         $trainee_names_all = array();

         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $workout_id_all[] = $trainee_workouts_all[$i]['id'];
             $workout_trainee_image = DB::table('trainee_details')->where('id',$trainee_workouts_all[$i]['trainee_id'])->value('profile_image');
             $trainee_images_all[] = $workout_trainee_image;
         }
         // dd($trainee_images_all);
         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $workout_id_all[] = $trainee_workouts_all[$i]['id'];
             $workout_trainee_name = DB::table('trainee_details')->where('id',$trainee_workouts_all[$i]['trainee_id'])->value('trainee_name');
             $trainee_names_all[] = $workout_trainee_name;
         }
         // dd($trainee_names_all);

         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $workout_id_all[] = $trainee_workouts_all[$i]['id'];
         }

         // dd($workout_id_all);
         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $likes_per_workout_all = DB::table('workouts')->where('id',$workout_id_all[$i])->value('likes_on_workout');

             if($likes_per_workout_all==NULL)
             {
                 $likes_per_workout_all = 0;
             }
             $likes_all[] = $likes_per_workout_all;
         }

         // dd($likes_all);

         for($i=0;$i<$trainee_workout_count_all;$i++)
         {
             $comments_per_id_all = DB::table('workout_comments')->where('workout_id',$workout_id_all[$i])->get();
             $comments_per_id_all = json_decode($comments_per_id_all,true);
             $count_comments_all = count($comments_per_id_all);


             $comments_all[] = $comments_per_id_all;
             $counts_all[] = $count_comments_all;

             $name_per_comment_all = DB::table('workout_comments')->select('trainee_name')->where('workout_id',$workout_id_all[$i])->get();
             $name_per_comment_all = json_decode($name_per_comment_all,true);
             $name_count_all = count($name_per_comment_all);
             $name_all[] = $name_per_comment_all;

             $name_counts_all[] = $name_count_all;

             $time_per_comment_all = DB::table('workout_comments')->select('created_at')->where('workout_id',$workout_id_all[$i])->get();
             $time_per_comment_all = json_decode($time_per_comment_all,true);

             $time_count_all = count($time_per_comment_all);

             $time_all[] = $time_per_comment_all;

             $image_per_comment_all = DB::table('workout_comments')->select('trainee_image')->where('workout_id',$workout_id_all[$i])->get();
             $image_per_comment_all = json_decode($image_per_comment_all,true);

             $image_count_all = count($image_per_comment_all);

             $image_all[] = $image_per_comment_all;

             // $image_workouts = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
             // $image_workouts = json_decode($image_workouts);

          }
          // dd($name_all);

          for($i=0;$i<$trainee_workout_count_all;$i++)
          {
              if($counts_all[$i]>0)
              {
                  for($j=0;$j<$counts_all[$i];$j++)
                  {
                      $time_all[$i][$j]['created_at'] = substr($time_all[$i][$j]['created_at'],11,5);
                      if(date($time_all[$i][$j]['created_at'])<12)
                      {
                          $time_all[$i][$j]['created_at'] = $time_all[$i][$j]['created_at']." AM";
                      }
                      else
                      {
                         $time_all[$i][$j]['created_at'] =  date('H:i', strtotime('-12 hour', strtotime($time_all[$i][$j]['created_at'])))." PM";
                      }


                  }
              }
          }
         //friends activity ends here
         // dd($trainee_workouts,$trainee_image,$name);
         // dd($counts_all);
         // dd($trainee_workouts[0]['id']);

        return view('traineee.trainee',compact('logged_in_user','trainee_image','trainee_workouts','comments','counts','trainee_workout_count','name','time','likes','image'
        ,'trainee_workouts_all','comments_all','counts_all','trainee_workout_count_all','name_all','time_all','likes_all','image_all','trainee_names_all','trainee_images_all'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $logged_in_user = Auth::user()->name;

        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $trainer_id = DB::table('trainee_details')->where('id',$trainee_id)->value('trainer_id');

        // dd($trainer_id);
        $trainer_names = DB::table('trainers')->get();


                $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->get();
                $trainee_workouts = json_decode($trainee_workouts,true);
                $trainee_workout_count = count($trainee_workouts);


                // dd($trainee_workout_count);

                $workout_id = array();

                for($i=0;$i<$trainee_workout_count;$i++)
                {
                    $workout_id[] = $trainee_workouts[$i]['id'];
                }

                for($i=0;$i<$trainee_workout_count;$i++)
                {
                    $comments_per_id = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
                    $comments_per_id = json_decode($comments_per_id,true);
                    $count_comments = count($comments_per_id);

                    $comments[] = $comments_per_id;
                    $counts[] = $count_comments;
                }

        return view('traineee/workout/create',compact('logged_in_user','trainer_names','trainer_id','trainee_image'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // dd($request->workout_image);
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $trainer_id = DB::table('trainers')->where('name',$request->trainer_name)->value('id');

        if($trainer_id==NULL)
        {
            $trainer_id = DB::table('trainee_details')->where('id',$trainee_id)->value('trainer_id');
        }
        // dd($trainer_id);
        //backend validations
        $this->validate($request,[
            'workout_name'=>'required|string',
            'workout_date'=>'required|date',
            'workout_start_time'=>'required',
            'workout_end_time'=>'required',
        ]);

        if($trainer_id==NULL)
        {
            $this->validate($request,[
                'trainer_name'=>'required',
            ]);
        }


        $date = $request->workout_date;

        $date = date("Y-m-d",strtotime($date));



        $start_time = $request->workout_start_time;

        $start_time_timeofday = substr($start_time,6,2);

        $start_time = substr($start_time, 0,5);
        $start_time = $start_time.":00";



        $end_time = $request->workout_end_time;

        $end_time_timeofday = substr($end_time,6,2);

        $end_time = substr($end_time, 0,5);
        $end_time = $end_time.":00";

        $imageName1 = NULL;
        if($request->hasFile('workout_image'))
        {

            $imageName1 = $request->workout_image->store('public');
        }


        $workout = new Workout;
        $workout->workout_name = $request->workout_name;
        $workout->workout_date = $date;
        $workout->workout_start_time = $start_time;
        $workout->workout_start_timeofday = $start_time_timeofday;
        $workout->workout_end_time = $end_time;
        $workout->workout_end_timeofday = $end_time_timeofday;
        $workout->comments = $request->comments;
        $workout->trainee_id = $trainee_id;
        $workout->workout_image = $imageName1;
        $workout->save();


        DB::table('trainee_details')
        ->where('id',$trainee_id)
        ->update(['trainer_id'=> $trainer_id]);

        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->get();
        $trainee_workouts = json_decode($trainee_workouts,true);
        $trainee_workout_count = count($trainee_workouts);


        // dd($trainee_workout_count);

        $workout_id = array();

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $workout_id[] = $trainee_workouts[$i]['id'];
        }



        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $likes_per_workout = DB::table('workouts')->where('id',$workout_id[$i])->value('likes_on_workout');

            if($likes_per_workout==NULL)
            {
                $likes_per_workout = 0;
            }
            $likes[] = $likes_per_workout;
        }

        // dd($workout_id);

        for($i=0;$i<$trainee_workout_count;$i++)
        {
            $comments_per_id = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
            $comments_per_id = json_decode($comments_per_id,true);
            $count_comments = count($comments_per_id);


            $comments[] = $comments_per_id;
            $counts[] = $count_comments;

            $name_per_comment = DB::table('workout_comments')->select('trainee_name')->where('workout_id',$workout_id[$i])->get();
            $name_per_comment = json_decode($name_per_comment,true);
            $name_count = count($name_per_comment);
            $name[] = $name_per_comment;

            $name_counts[] = $name_count;

            $time_per_comment = DB::table('workout_comments')->select('created_at')->where('workout_id',$workout_id[$i])->get();
            $time_per_comment = json_decode($time_per_comment,true);

            $time_count = count($time_per_comment);

            $time[] = $time_per_comment;

            $image_per_comment = DB::table('workout_comments')->select('trainee_image')->where('workout_id',$workout_id[$i])->get();
            $image_per_comment = json_decode($image_per_comment,true);

            $image_count = count($image_per_comment);

            $image[] = $image_per_comment;
         }



         for($i=0;$i<$trainee_workout_count;$i++)
         {
             if($counts[$i]>0)
             {
                 for($j=0;$j<$counts[$i];$j++)
                 {
                     $time[$i][$j]['created_at'] = substr($time[$i][$j]['created_at'],11,5);
                     if(date($time[$i][$j]['created_at'])<12)
                     {
                         $time[$i][$j]['created_at'] = $time[$i][$j]['created_at']." AM";
                     }
                     else
                     {
                        $time[$i][$j]['created_at'] =  date('H:i', strtotime('-12 hour', strtotime($time[$i][$j]['created_at'])))." PM";
                     }


                 }
             }
         }



                  $trainee_workouts_all = DB::table('workouts')->orderBy('created_at','Desc')->get();
                  $trainee_workouts_all = json_decode($trainee_workouts_all,true);
                  $trainee_workout_count_all = count($trainee_workouts_all);
                  // dd($trainee_workout_count_all);


                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $trainee_workouts_all[$i]['workout_start_time'] = date("H:i",strtotime($trainee_workouts_all[$i]['workout_start_time']));
                  }
                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $trainee_workouts_all[$i]['workout_end_time'] = date("H:i",strtotime($trainee_workouts_all[$i]['workout_end_time']));
                  }

                  // dd($trainee_workouts_all);



                  $workout_id_all = array();
                  $trainee_names_all = array();

                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $workout_id_all[] = $trainee_workouts_all[$i]['id'];
                      $workout_trainee_name = DB::table('trainee_details')->where('id',$trainee_workouts_all[$i]['trainee_id'])->value('trainee_name');
                      $trainee_names_all[] = $workout_trainee_name;
                  }
                  // dd($trainee_names_all);

                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $workout_id_all[] = $trainee_workouts_all[$i]['id'];
                  }

                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $workout_id_all[] = $trainee_workouts_all[$i]['id'];
                      $workout_trainee_image = DB::table('trainee_details')->where('id',$trainee_workouts_all[$i]['trainee_id'])->value('profile_image');
                      $trainee_images_all[] = $workout_trainee_image;
                  }

                  // dd($workout_id_all);
                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $likes_per_workout_all = DB::table('workouts')->where('id',$workout_id_all[$i])->value('likes_on_workout');

                      if($likes_per_workout_all==NULL)
                      {
                          $likes_per_workout_all = 0;
                      }
                      $likes_all[] = $likes_per_workout_all;
                  }

                  // dd($likes_all);

                  for($i=0;$i<$trainee_workout_count_all;$i++)
                  {
                      $comments_per_id_all = DB::table('workout_comments')->where('workout_id',$workout_id_all[$i])->get();
                      $comments_per_id_all = json_decode($comments_per_id_all,true);
                      $count_comments_all = count($comments_per_id_all);


                      $comments_all[] = $comments_per_id_all;
                      $counts_all[] = $count_comments_all;

                      $name_per_comment_all = DB::table('workout_comments')->select('trainee_name')->where('workout_id',$workout_id_all[$i])->get();
                      $name_per_comment_all = json_decode($name_per_comment_all,true);
                      $name_count_all = count($name_per_comment_all);
                      $name_all[] = $name_per_comment_all;

                      $name_counts_all[] = $name_count_all;

                      $time_per_comment_all = DB::table('workout_comments')->select('created_at')->where('workout_id',$workout_id_all[$i])->get();
                      $time_per_comment_all = json_decode($time_per_comment_all,true);

                      $time_count_all = count($time_per_comment_all);

                      $time_all[] = $time_per_comment_all;

                      $image_per_comment_all = DB::table('workout_comments')->select('trainee_image')->where('workout_id',$workout_id_all[$i])->get();
                      $image_per_comment_all = json_decode($image_per_comment_all,true);

                      $image_count_all = count($image_per_comment_all);

                      $image_all[] = $image_per_comment_all;

                      // $image_workouts = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
                      // $image_workouts = json_decode($image_workouts);

                   }
                   // dd($name_all);

                   for($i=0;$i<$trainee_workout_count_all;$i++)
                   {
                       if($counts_all[$i]>0)
                       {
                           for($j=0;$j<$counts_all[$i];$j++)
                           {
                               $time_all[$i][$j]['created_at'] = substr($time_all[$i][$j]['created_at'],11,5);
                               if(date($time_all[$i][$j]['created_at'])<12)
                               {
                                   $time_all[$i][$j]['created_at'] = $time_all[$i][$j]['created_at']." AM";
                               }
                               else
                               {
                                  $time_all[$i][$j]['created_at'] =  date('H:i', strtotime('-12 hour', strtotime($time_all[$i][$j]['created_at'])))." PM";
                               }


                           }
                       }
                   }
                   // dd($image);
        return view('traineee.trainee',compact('logged_in_user','trainee_image','trainee_workouts','comments','counts','trainee_workout_count','name','image','time','likes'
    ,'trainee_workouts_all','comments_all','counts_all','trainee_workout_count_all','name_all','time_all','likes_all','image_all','trainee_names_all','trainee_images_all'));
    }

    public function display()
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        // dd($trainee_id);


        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->get();

        // dd($trainee_workouts);
        // dd($logged_in_user);
        return view('traineee.workout.show',compact('logged_in_user','trainee_workouts','trainee_image'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $workouts = DB::table('workouts')->where('id',$id)->get();

        // dd($workouts);
        return view('traineee/workout/edit',compact('workouts','id','trainee_image'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // dd($id);
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $workout_image = DB::table('workouts')->where('id',$id)->value('workout_image');

        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->get();

        $trainer_id = DB::table('trainers')->where('name',$request->trainer_name)->value('id');

        $this->validate($request,[
            'workout_name'=>'required|string',
            'workout_date'=>'required|date',
            'workout_start_time'=>'required',
            'workout_end_time'=>'required',
        ]);

        $imageName = $workout_image;
        // dd($request->hasFile('profile_image'));
        if($request->hasFile('workout_image'))
        {
            $imageName = $request->workout_image->store('public');
            $workout_image = $request->workout_image->store('public');
        }

        $date = $request->workout_date;
        $date = date("Y-m-d",strtotime($date));

        $start_time = $request->workout_start_time;

        $start_time_timeofday = substr($start_time,6,2);
        $start_time = substr($start_time, 0,5);
        $start_time = $start_time.":00";

        $end_time = $request->workout_end_time;

        $end_time_timeofday = substr($end_time,6,2);

        $end_time = substr($end_time, 0,5);
        $end_time = $end_time.":00";

        // dd($imageName);

        $workout = Workout::find($id);
        $workout->workout_name = $request->workout_name;
        $workout->workout_date = $date;
        $workout->workout_start_time = $start_time;
        $workout->workout_start_timeofday = $start_time_timeofday;
        $workout->workout_end_time = $end_time;
        $workout->workout_end_timeofday = $end_time_timeofday;
        $workout->comments = $request->comments;
        $workout->workout_image = $imageName;
        $workout->trainee_id = $trainee_id;
        $workout->save();

        Session::flash('message','Your Workout changes have been updated');
        return view('traineee.workout.show',compact('logged_in_user','trainee_image','trainee_workouts'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        // dd($id);
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        // dd($trainee_id);

        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->get();

        // DB::table('workouts')->where('id',$id)->delete();

        Workout::where('id',$id)->delete();
        return redirect()->back();

        // return view('traineee.workout.show',compact('logged_in_user','trainee_image','trainee_workouts'));
    }

    public function profile()
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        return view('traineee/profile/profile',compact('logged_in_user','trainee_image'));
    }

    public function editprofile()
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $trainer_id = DB::table('trainee_details')->where('id',$trainee_id)->value('trainer_id');

        $trainer_names = DB::table('trainers')->get();

        $trainee_details = trainee_detail::find($trainee_id);

        $trainer_name = DB::table('trainers')->where('id',$trainer_id)->value('name');

        // dd($trainer_name);
        return view('traineee/profile/editprofile',compact('logged_in_user','trainer_id','trainer_names','trainee_details','trainee_image','trainer_name'));
    }

    public function updateprofile(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'trainee_name'=>'required|string',
            'trainee_emailid'=>'required|email',
            // 'trainee_trainer_name'=>'required',
        ]);

        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');


        // dd($request->all());
        $imageName = $trainee_image;
        // dd($request->hasFile('profile_image'));
        if($request->hasFile('profile_image'))
        {
            $imageName = $request->profile_image->store('public');
            $trainee_image = $request->profile_image->store('public');
            // dd($imageName);
        }
        // dd($imageName);

        // dd($imageName, $trainee_image);
        $logged_in_user = Auth::user()->name;


        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');

        // dd($trainee_id);
        $date = $request->trainee_dob;
        $date = date("Y-m-d",strtotime($date));

        // dd($request->trainee_mobilenumber);
        $trainee_detail = trainee_detail::find($trainee_id);
        $trainee_detail->trainee_name = $request->trainee_name;
        $trainee_detail->trainee_emailid = $request->trainee_emailid;
        $trainee_detail->trainee_dob = $date;
        $trainee_detail->trainee_mobilenumber = $request->trainee_mobilenumber;
        $trainee_detail->profile_image = $imageName;

        $trainer_name = $request->trainer_name;

        $admin_details = Admin::find($trainee_id);
        $admin_details->name = $request->trainee_name;
        $admin_details->email = $request->trainee_emailid;
        $admin_details->save();

        $trainer_id =DB::table('trainers')->where('name',$trainer_name)->value('id');
        DB::table('trainee_details')
        ->where('id',$trainee_id)
        ->update(['trainer_id'=> $trainer_id]);

        // dd($imageName, $trainee_image);
        $trainee_detail->save();

        Session::flash('message','Your Profile Settings have been changed');
        return view('traineee/profile/profile',compact('trainee_image'));
    }

    public function addcomment(Request $request)
    {
        // dd($request->comment1,$request->id);

        $workout_id = $request->id;
        $comment_for_workout = $request->comment1;
        // dd($workout_id);
        $trainee_id = DB::table('workouts')->where('id',$workout_id)->value('trainee_id');
        // dd($trainee_id);

        $trainee_name = DB::table('trainee_details')->where('id',$trainee_id)->value('trainee_name');
        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $workout_comment = new workout_comment;
        $workout_comment->comment = $comment_for_workout;
        $workout_comment->workout_id = $workout_id;
        $workout_comment->trainee_id = $trainee_id;
        $workout_comment->trainee_name = $trainee_name;
        $workout_comment->trainee_image = $trainee_image;
        $workout_comment->save();

        $logged_in_user = Auth::user()->name;

        // $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');
        //
        // // dd($trainee_id);
        //
        // $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');
        //
        // $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->orderBy('created_at','Desc')->get();
        // $trainee_workout1 = DB::table('workouts')->where('trainee_id',$trainee_id)->get();
        // $trainee_workouts = json_decode($trainee_workouts,true);
        // $trainee_workout_count = count($trainee_workouts);
        //
        //
        //
        // for($i=0;$i<$trainee_workout_count;$i++)
        // {
        //     $trainee_workouts[$i]['workout_start_time'] = date("H:i",strtotime($trainee_workouts[$i]['workout_start_time']));
        // }
        // for($i=0;$i<$trainee_workout_count;$i++)
        // {
        //     $trainee_workouts[$i]['workout_end_time'] = date("H:i",strtotime($trainee_workouts[$i]['workout_end_time']));
        // }
        //
        //
        //
        //
        // $workout_id = array();
        //
        // for($i=0;$i<$trainee_workout_count;$i++)
        // {
        //     $workout_id[] = $trainee_workouts[$i]['id'];
        // }
        //
        // for($i=0;$i<$trainee_workout_count;$i++)
        // {
        //     $likes_per_workout = DB::table('workouts')->where('id',$workout_id[$i])->value('likes_on_workout');
        //
        //     if($likes_per_workout==NULL)
        //     {
        //         $likes_per_workout = 0;
        //     }
        //     $likes[] = $likes_per_workout;
        // }
        //
        // // dd($workout_id);
        //
        // for($i=0;$i<$trainee_workout_count;$i++)
        // {
        //     $comments_per_id = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
        //     $comments_per_id = json_decode($comments_per_id,true);
        //     $count_comments = count($comments_per_id);
        //
        //
        //     $comments[] = $comments_per_id;
        //     $counts[] = $count_comments;
        //
        //     $name_per_comment = DB::table('workout_comments')->select('trainee_name')->where('workout_id',$workout_id[$i])->get();
        //     $name_per_comment = json_decode($name_per_comment,true);
        //     $name_count = count($name_per_comment);
        //     $name[] = $name_per_comment;
        //
        //     $name_counts[] = $name_count;
        //
        //     $time_per_comment = DB::table('workout_comments')->select('created_at')->where('workout_id',$workout_id[$i])->get();
        //     $time_per_comment = json_decode($time_per_comment,true);
        //
        //     $time_count = count($time_per_comment);
        //
        //     $time[] = $time_per_comment;
        //
        //     // $image_workouts = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
        //     // $image_workouts = json_decode($image_workouts);
        //
        //  }
        //
        //
        //  for($i=0;$i<$trainee_workout_count;$i++)
        //  {
        //      if($counts[$i]>0)
        //      {
        //          for($j=0;$j<$counts[$i];$j++)
        //          {
        //              $time[$i][$j]['created_at'] = substr($time[$i][$j]['created_at'],11,5);
        //              if(date($time[$i][$j]['created_at'])<12)
        //              {
        //                  $time[$i][$j]['created_at'] = $time[$i][$j]['created_at']." AM";
        //              }
        //              else
        //              {
        //                 $time[$i][$j]['created_at'] =  date('H:i', strtotime('-12 hour', strtotime($time[$i][$j]['created_at'])))." PM";
        //              }
        //
        //
        //          }
        //      }
        //  }
        // dd($workout_id);
         //specific to workout code

         $comments_for_workoutid = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$comments_for_workoutid = json_decode($comments_for_workoutid,true);
// dd($comments_for_workoutid);
$count_for_workout_comments = count($comments_for_workoutid);

$comments_per_workout = array();
for($i=0;$i<$count_for_workout_comments;$i++)
{
        $comments_per_workout[] = $comments_for_workoutid[$i]['comment'];
}

$names_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$names_for_comments = json_decode($names_for_comments,true);
// dd($comments_for_workoutid);
$count_for_names = count($names_for_comments);

$names_per_comments = array();

for($i=0;$i<$count_for_names;$i++)
{
        $names_per_comments[] = $names_for_comments[$i]['trainee_name'];
}

$time_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$time_for_comments = json_decode($time_for_comments,true);
// dd($time_for_comments);
$time_per_comments = array();
for($i=0;$i<$count_for_names;$i++)
{
        $time_per_comments[] = $time_for_comments[$i]['created_at'];
}

$image_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$image_for_comments = json_decode($image_for_comments,true);
// dd($image_for_comments);
$image_per_comments = array();
for($i=0;$i<$count_for_names;$i++)
{
        $image_per_comments[] = $image_for_comments[$i]['trainee_image'];
}
// dd($time_per_comments);
for($j=0;$j<$count_for_names;$j++)
{
    $time_per_comments[$j] = substr($time_per_comments[$j],11,5);
    if(date($time_per_comments[$j])<12)
    {
        $time_per_comments[$j] = $time_per_comments[$j]." AM";
    }
    else
    {
       $time_per_comments[$j] =  date('H:i', strtotime('-12 hour', strtotime($time_per_comments[$j])))." PM";
    }

}
// dd($time_per_comments,$count_for_names,$comments_per_workout,$names_per_comments);


        // dd($counts,$name,$comments);
        return view('traineee.workout.allcomments',compact('time_per_comments','count_for_names','comments_per_workout','names_per_comments','image_per_comments'));
    }

    public function addcommentall(Request $request)
    {
        // dd($request->comment1,$request->id);

        $workout_id = $request->id2;
        $comment_for_workout = $request->comment2;
        // dd($workout_id,$comment_for_workout);

        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('trainee_details')->where('trainee_name',$logged_in_user)->value('id');
        // dd($trainee_id);

        $trainee_name = DB::table('trainee_details')->where('id',$trainee_id)->value('trainee_name');
        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');
        // dd($trainee_image);
        $workout_comment = new workout_comment;
        $workout_comment->comment = $comment_for_workout;
        $workout_comment->workout_id = $workout_id;
        $workout_comment->trainee_id = $trainee_id;
        $workout_comment->trainee_name = $trainee_name;
        $workout_comment->trainee_image = $trainee_image;
        $workout_comment->save();


         //specific to workout code

         $comments_for_workoutid = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$comments_for_workoutid = json_decode($comments_for_workoutid,true);
// dd($comments_for_workoutid);
$count_for_workout_comments = count($comments_for_workoutid);

$comments_per_workout = array();
for($i=0;$i<$count_for_workout_comments;$i++)
{
        $comments_per_workout[] = $comments_for_workoutid[$i]['comment'];
}

$names_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$names_for_comments = json_decode($names_for_comments,true);
// dd($comments_for_workoutid);
$count_for_names = count($names_for_comments);

$names_per_comments = array();

for($i=0;$i<$count_for_names;$i++)
{
        $names_per_comments[] = $names_for_comments[$i]['trainee_name'];
}

$time_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$time_for_comments = json_decode($time_for_comments,true);
// dd($time_for_comments);
$time_per_comments = array();
for($i=0;$i<$count_for_names;$i++)
{
        $time_per_comments[] = $time_for_comments[$i]['created_at'];
}

$image_for_comments = DB::table('workout_comments')->where('workout_id',$workout_id)->get();
$image_for_comments = json_decode($image_for_comments,true);
// dd($image_for_comments);
$image_per_comments = array();
for($i=0;$i<$count_for_names;$i++)
{
        $image_per_comments[] = $image_for_comments[$i]['trainee_image'];
}
// dd($time_per_comments);
for($j=0;$j<$count_for_names;$j++)
{
    $time_per_comments[$j] = substr($time_per_comments[$j],11,5);
    if(date($time_per_comments[$j])<12)
    {
        $time_per_comments[$j] = $time_per_comments[$j]." AM";
    }
    else
    {
       $time_per_comments[$j] =  date('H:i', strtotime('-12 hour', strtotime($time_per_comments[$j])))." PM";
    }

}
// dd($time_per_comments,$count_for_names,$comments_per_workout,$names_per_comments);


        // dd($counts,$name,$comments);
        return view('traineee.workout.allcomments',compact('time_per_comments','count_for_names','comments_per_workout','names_per_comments','image_per_comments'));
    }

    public function commentcount(Request $request)
    {
        // dd($workout_id);
        $workout_id = $request->id;
        $commentcount = DB::table('workout_comments')->where('workout_id',$workout_id)->count();

        return view('traineee/workout/commentcount',compact('commentcount'));

    }
    public function commentcountall(Request $request)
    {
        // dd($workout_id);
        $workout_id = $request->id;
        $commentcount = DB::table('workout_comments')->where('workout_id',$workout_id)->count();

        return view('traineee/workout/commentcount',compact('commentcount'));

    }

    public function updatelikes(Request $request)
    {
        // dd($request->id);
        $workout_id = $request->id;
        $likes_on_workout = DB::table('workouts')->where('id',$workout_id)->value('likes_on_workout');

        $likes_on_workout = $likes_on_workout + 1;

         DB::table('workouts')->where('id',$workout_id)->update(['likes_on_workout'=>$likes_on_workout]);

         return view('traineee/workout/updatelikes',compact('likes_on_workout'));
    }
}
