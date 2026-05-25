<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(){
        $query = Filme::query();
        $Filmes = $query->get();
        return view('ListarFilmes', compact('Filmes'));
    }
}