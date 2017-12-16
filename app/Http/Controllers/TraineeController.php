<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Workout;

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
        // dd($logged_in_user);
        return view('traineee.trainee',compact('logged_in_user'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');



        $trainer_names = DB::table('trainers')->get();
        return view('traineee/workout/create',compact('logged_in_user','trainer_names'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //backend validations
        $this->validate($request,[
            'workout_name'=>'required|string',
            'workout_date'=>'required|date',
            'workout_start_time'=>'required',
            'workout_end_time'=>'required',
            'trainer_name'=>'required',
        ]);
        $logged_in_user = Auth::user()->name;

        $trainee_id = DB::table('admins')->where('name',$logged_in_user)->value('id');
        // dd($trainee_id);

        $trainer_id = DB::table('trainers')->where('name',$request->trainer_name)->value('id');

        $date = $request->workout_date;
        $date = date("Y-m-d",strtotime($date));

        $start_time = $request->workout_start_time;
        $start_time = substr($start_time, 0,5);
        $start_time = $start_time.":00";

        $end_time = $request->workout_end_time;
        $end_time = substr($end_time, 0,5);
        $end_time = $end_time.":00";


        $workout = new Workout;
        $workout->workout_name = $request->workout_name;
        $workout->workout_date = $date;
        $workout->workout_start_time = $start_time;
        $workout->workout_end_time = $end_time;
        $workout->comments = $request->comments;
        $workout->trainee_id = $trainee_id;
        $workout->save();


        DB::table('trainee_details')
        ->where('id',$trainee_id)
        ->update(['trainer_id'=> $trainer_id]);

        return view('traineee.trainee',compact('logged_in_user'));
    }

    public function display()
    {
        $logged_in_user = Auth::user()->name;
        return view('traineee.workout.show',compact('logged_in_user'));
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
}
