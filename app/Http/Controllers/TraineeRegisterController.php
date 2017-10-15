<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\role;
use App\role_admin;
use DB;
use Session;

class TraineeRegisterController extends Controller
{
    public function showRegistrationForm()
   {
       return view('traineee.trainee_register');
   }

   public function register(Request $request)
   {
       $this->validation($request);

       $name = $request->name;
       $email = $request->email;
       $password = bcrypt($request->password);
       Admin::create([
           'name' => $name,
           'email' => $email,
           'password' => $password,
       ]);

       $roles = new role;
       $roles->name = "Trainee";
       $roles->save();

       $role_id = DB::table('roles')->max('id');
       $admin_id = DB::table('admins')->max('id');

       $role_admin = new role_admin;
       $role_admin->role_id = $role_id;
       $role_admin->admin_id = $admin_id;
       $role_admin->save();

       Session::flash('success','You have been Registered Successfully!! Please Login Now!!');
       return view('admin.login');


   }

   public function validation($request)
   {
       return $this->validate($request, [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:admins',
           'password' => 'required|string|min:6|confirmed',
       ]);
   }
}
