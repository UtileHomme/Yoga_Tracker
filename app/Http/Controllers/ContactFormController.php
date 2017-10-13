<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class ContactFormController extends Controller
{
    public function contact(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'subject' => 'min:3',
            'message1' => 'min:10',
        ]);


        $data = ['name' => $request->name, 'email'=>$request->email,'subject'=>$request->subject,'message1'=>$request->message];

        Mail::send('emails.contact', $data, function($message)use($data) {
            $message->to('jatins368@gmail.com')->subject
            ($data['subject']);
            $message->from($data['email']);
        });

        Session::flash('success', 'Your Email was Sent');

        return redirect()->route('welcome');
    }
}
