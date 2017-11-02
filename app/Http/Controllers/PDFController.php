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

            $pdf = PDF::loadView('pdfview',compact('info'));
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview', compact('info'));
    }
}
