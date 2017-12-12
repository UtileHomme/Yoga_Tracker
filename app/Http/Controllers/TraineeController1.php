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

    public function index()
    {
        $logged_in_user = Auth::guard('admin')->user()->name;
        // dd($logged_in_user);
        return view('traineee.trainee',compact('logged_in_user'));
    }

    public function create()
    {
        $logged_in_user = Auth::user()->name;
        return view('traineee/workout/create',compact('logged_in_user'));
    }

    public function show()
    {
        $logged_in_user = Auth::user()->name;
        return view('traineee.workout.show',compact('logged_in_user'));
    }

    //making a page which is accessible to the editor and admin
    public function test()
    {
        return view('admin.test');
    }
}
