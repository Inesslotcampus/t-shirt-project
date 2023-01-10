<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadPDF(string $motif){
        
        
        $array=explode(",",$motif); 
        $pdf = Pdf::loadView('pdf.photo', compact('array'));

        return $pdf->download('t-shirt.pdf');
    }
}
