<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{

    public function listadoLibros()
    {
        $libros = Libro::all();
        $pdf =  Pdf::loadView('pdf.ejemplo',compact('libros'));
        return $pdf->download('Listado de libros.pdf');
    }
}
