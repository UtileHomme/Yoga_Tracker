<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */

    //redirection for admins after login
    protected $redirectTo = 'admin/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        //the guard being applied is "admin" now .. not "web" which is default
        $this->middleware('guest:admin')->except('logout');
    }

    //this function ensures that the redirection to dashboard happens on the basis of the roles
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach($this->guard('admin')->user()->role as $role)
        {
            if($role->name == 'admin')
            {
                return redirect('admin/home');
            }
            else if($role->name == 'Trainee')
            {
                return redirect('workout');
            }
            else if($role->name == 'Trainer')
            {
                return redirect('trainer');
            }
        }
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
