<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //to make the authentication work for admin do this
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.home');
    }


        public function create()
        {
            $logged_in_user = Auth::user()->name;
            return view('admin/trainer/create',compact('logged_in_user'));
        }

        public function store(Request $request)
        {
                $logged_in_user = Auth::user()->name;

                
        }
    }
