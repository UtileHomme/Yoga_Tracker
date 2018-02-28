<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
use Carbon\Carbon;
use App\trainer_detail;
use App\Admin;
use Illuminate\Support\Facades\Response;



class TrainerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('trainer',['except'=>'test']);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

        $logged_in_user = Auth::user()->name;

        $trainer_image = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('profile_image');
        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');

        $trainee_details = DB::table('trainee_details')->where('trainer_id',$trainer_id)->get();

        // $diffForHumans = $trainee_details[0]->created_at->diffForHumans();

        foreach($trainee_details as $detail)
        {
            $detail->created_at = substr($detail->created_at,0,11);
        }

        $trainee_count = count($trainee_details);
        // dd($diffForHumans);
        // dd($trainee_details);

        return view('trainer.home',compact('trainer_image','trainee_details','trainee_count'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $trainee_id = $id;

        $logged_in_user = Auth::user()->name;

        $trainer_image = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('profile_image');
        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');


        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        $trainee_workouts_show = DB::table('workouts')->where('trainee_id',$trainee_id)->get();

        // dd($trainee_workouts_show);

        return view('trainer.workout.show',compact('logged_in_user','trainee_workouts_show','trainer_image','trainee_id'));

    }

    public function downloadcsv()
    {
        $trainee_id = $_GET['id'];
        // dd($trainee_id);
        $trainee_name = DB::table('trainee_details')->where('id',$trainee_id)->value('trainee_name');
        $download_status = $_GET['download'];

        $logged_in_user = Auth::user()->name;

        $trainer_image = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('profile_image');
        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');


        $trainee_image = DB::table('trainee_details')->where('id',$trainee_id)->value('profile_image');

        // dd($trainee_id);
        $trainee_workouts_show = DB::table('workouts')->where('trainee_id',$trainee_id)->get();

        // dd($trainee_workouts_show);


        if(isset($_GET['download']))
        {
            $trainee_workouts_download = DB::table('workouts')->select('id','workout_name','workout_date','workout_start_time','workout_start_timeofday','workout_end_time','workout_end_timeofday','comments')->where('trainee_id',$trainee_id)->get();
            $trainee_workouts_download = json_decode($trainee_workouts_download,true);

            $array = array('Workout Id','Workout Name','Workout Date','Workout Start Time', 'Workout Start Time of the Day','Workout End Time','Workout End Time of the Day', 'Post Name');

            $filename = "Workout_For_".$trainee_name.".csv";

            $fp = fopen($filename, 'w');

            fputcsv($fp, $array );
            foreach ($trainee_workouts_download as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);

            $headers = array(
                'Content-Type' => 'text/csv',
            );
            return Response::download($filename, $filename, $headers);
        }

        return view('trainer.workout.show',compact('logged_in_user','trainee_workouts_show','trainer_image','trainee_id'));

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
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
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }

    public function trainerprofile()
    {
        $logged_in_user = Auth::user()->name;

        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');

        $trainer_image = DB::table('trainer_details')->where('id',$trainer_id)->value('profile_image');

        $trainee_count = DB::table('trainee_details')->where('trainer_id',$trainer_id)->count();

        // dd($trainee_count);
        return view('trainer/profile/profile',compact('logged_in_user','trainer_image','trainee_count'));
    }

    public function edittrainerprofile()
    {
        $logged_in_user = Auth::user()->name;

        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');

        $trainer_image = DB::table('trainer_details')->where('id',$trainer_id)->value('profile_image');

        $trainer_details = trainer_detail::find($trainer_id);

        return view('trainer/profile/editprofile',compact('logged_in_user','trainer_details','trainer_image'));

    }

    public function updatetrainerprofile(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'trainer_name'=>'required|string',
            'trainer_emailid'=>'required|email',
            // 'trainee_trainer_name'=>'required',
        ]);

        $logged_in_user = Auth::user()->name;

        $trainer_id = DB::table('trainer_details')->where('trainer_name',$logged_in_user)->value('id');

        $trainer_image = DB::table('trainer_details')->where('id',$trainer_id)->value('profile_image');

        $imageName = $trainer_image;
        // dd($request->hasFile('profile_image'));
        if($request->hasFile('profile_image'))
        {
            $imageName = $request->profile_image->store('public');
            $trainer_image = $request->profile_image->store('public');
            // dd($imageName);
        }

        $date = $request->trainer_dob;
        $date = date("Y-m-d",strtotime($date));

        $trainer_detail = trainer_detail::find($trainer_id);
        $trainer_detail->trainer_name = $request->trainer_name;
        $trainer_detail->trainer_emailid = $request->trainer_emailid;
        $trainer_detail->trainer_dob = $date;
        $trainer_detail->trainer_mobilenumber = $request->trainer_mobilenumber;
        $trainer_detail->profile_image = $imageName;

        $admin_details = Admin::find($trainer_id);
        $admin_details->name = $request->trainer_name;
        $admin_details->email = $request->trainer_emailid;
        $admin_details->save();

        $trainer_detail->save();

        $trainee_count = DB::table('trainee_details')->where('trainer_id',$trainer_id)->count();

        Session::flash('message','Your Profile Settings have been changed');
        // return view('trainer/profile/profile',compact('trainer_image','trainee_count'));
        return redirect()->route('trainerprofile');
    }


}
