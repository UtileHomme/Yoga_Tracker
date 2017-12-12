<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        return view('traineee/workout/create',compact('logged_in_user'));
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
