<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('trainee',['except'=>'test']);
    }

    public function index()
    {
        return view('traineee.trainee');
    }

    //making a page which is accessible to the editor and admin
    public function test()
    {
        return view('admin.test');
    }
}
