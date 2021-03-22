<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    
    public function preview(Request $request)
    {
        $id = $request->input('test');
        return view('preview', ['id'=> $id]);
    }

    public function generatePDF()
    {
        $pdf = PDF::loadView('preview');    
        return $pdf->download('demo.pdf');
    }
}
