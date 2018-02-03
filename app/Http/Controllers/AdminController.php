<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\role;
use App\role_admin;
use DB;
use Session;

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

                // dd($request->all());

                $this->validate($request,[
                    'trainer_name'=>'required|string',
                    'trainer_email'=>'required|string|email|max:255|unique:admins',
                    'password'=>'required|string|min:6|confirmed',
                ]);

                $name = $request->trainer_name;
                $email = $request->trainer_email;
                $password = bcrypt($request->password);

                DB::table('admins')->insert(
                ['name' => $name, 'email' => $email,'password'=>$password]);

                $trainer_id = DB::table('admins')->max('id');

                $trainer_default_image = 'public/'.rand(1,3).'.png';

                $role_id = 3;
                $admin_id = DB::table('admins')->max('id');

                $role_admin = new role_admin;
                $role_admin->role_id = $role_id;
                $role_admin->admin_id = $admin_id;
                $role_admin->save();


                DB::table('trainer_details')->insert(
                ['trainer_name' => $name, 'trainer_emailid' => $email,'id'=>$trainer_id,'profile_image'=>$trainer_default_image]);

                Session::flash('message','The New Trainer has Been added successfully!!');
                return redirect()->route('admin.home');

                // dd($password);
        }
    }
