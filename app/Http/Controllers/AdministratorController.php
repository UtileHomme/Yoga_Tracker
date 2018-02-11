<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
{
    //to make the authentication work for admin do this
    $this->middleware('auth:admin');
    $this->middleware('admin');
}

    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logged_in_user = Auth::user()->name;
           return view('admin/trainer/create',compact('logged_in_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logged_in_user = Auth::user()->name;

              // dd($request->all());

              $this->validate($request,[
                  'trainer_name'=>'required|string',
                  'email'=>'required|string|email|max:255|unique:admins',
                  'password'=>'required|string|min:6|confirmed',
              ]);

              $name = $request->trainer_name;
              $email = $request->email;
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

              $trainer_details = DB::table('trainer_details')->get();

              Session::flash('message','The New Trainer has Been added successfully!!');
              // return redirect()->route('admin.home');
              return view('admin.trainer.show',compact('trainer_details'));
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
        $id = $_GET['id'];
            // dd($id);

            $logged_in_user = Auth::user()->name;

            $trainer_detail = DB::table('trainer_details')->where('id',$id)->get();

            // dd($trainer_detail);

            return view('admin.trainer.edit',compact('trainer_detail','id'));
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
        $this->validate($request,[
                'trainer_name'=>'required|string',
                'email'=>'required|string|email|max:255|unique:admins',
                'password'=>'required|string|min:6|confirmed',
            ]);

            dd($request->all());
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
