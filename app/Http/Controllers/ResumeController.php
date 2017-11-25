<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ResumeController extends Controller
{
    public function index()
    {
        $file= public_path(). "/download/Jatin_Sharma_CV.pdf";

$headers = array(
          'Content-Type: application/pdf',
        );

return Response::download($file, 'Jatin_Sharma_Resume.pdf', $headers);
    }
}
