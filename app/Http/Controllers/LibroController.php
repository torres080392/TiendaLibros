<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function listaLibros(){
        $libros= Libro::simplePaginate(6);
        return view('components.listaLibros',compact('libros'));
    }

    public function index(){
        return view('components.libro');
    }
}
