<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Workout;
use App\trainee_detail;
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

        $trainee_workouts = DB::table('workouts')->where('trainee_id',$trainee_id)->orderBy('created_at','Desc')->get();
        $trainee_workout1 = DB::table('workouts')->where('trainee_id',$trainee_id)->get();
        $trainee_workouts = json_decode($trainee_workouts,true);
        $trainee_workout_count = count($trainee_workouts);



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

            // $image_workouts = DB::table('workout_comments')->where('workout_id',$workout_id[$i])->get();
            // $image_workouts = json_decode($image_workouts);

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



        return view('traineee.trainee',compact('logged_in_user','trainee_image','trainee_workouts','comments','counts','trainee_workout_count','name','time','likes'));
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



        return view('traineee.trainee',compact('logged_in_user','trainee_image','trainee_workouts','comments','counts','trainee_workout_count','name','time','likes'));
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
}
