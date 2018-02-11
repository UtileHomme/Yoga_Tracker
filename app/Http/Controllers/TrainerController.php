<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
use Carbon\Carbon;

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
