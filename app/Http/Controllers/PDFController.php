<?php

namespace App\Http\Controllers;
use DB;
use \PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{

    public function index1()
    {
        $info = DB::table('admins')->get();
        return view('pdfview1',compact('info'));

    }
    public function index(Request $request)
    {
        $info = DB::table('admins')->get();

        // dd($info);
        if($request->has('download'))
        {
            $leadid = 3454;
            $pdf = PDF::loadView('pdfview',compact('info'));
            return $pdf->download("Assessment_Form_for_$leadid.pdf");
        }

        return view('pdfview', compact('info'));
    }
}
