<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autores;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(){
        $query = Autores::query();
        $Autores = $query->get();
        return view('ListarAutor', compact('Autores'));
    }

}