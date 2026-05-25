<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

// Filme

Route::get('/filme/listar', [FilmeController::class, 'listar']) -> name('filme.listar');


// Autor

Route::get('/autor/listar', [AutorController::class, 'listar']) -> name('autor.listar');