<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/',[InicioController::class,'index'])->name('welcome-index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/Autor', [AutorController::class,'index'])->name('autor-index');
    Route::get('/Editorial', [EditorialController::class,'index'])->name('editorial-index');
    Route::get('/Libro', [LibroController::class,'index'])->name('libro-index');
    Route::get('/listaLibros', [LibroController::class,'listaLibros'])->name('listaLibros-index');
    Route::get('/PDFEjemplo', [PDFController::class,'listadoLibros'])->name('pdf-index');
    Route::get('/Buscador', [BuscadorController::class,'index'])->name('buscador-index');
});

require __DIR__.'/auth.php';
