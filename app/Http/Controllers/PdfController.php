<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadPDF(string $motif){
        $motifs=[$motif];
        
        $pdf = Pdf::loadView('pdf.photo', compact('motifs'));

        return $pdf->download('invoice.pdf');
    }
}
