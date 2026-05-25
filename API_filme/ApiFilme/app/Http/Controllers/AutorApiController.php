<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autores;

use Illuminate\Http\Request;

class AutorApiController extends Controller
{
    public function listarApi(){
        $autores = Autores::all();
        return response()->json($autores, 200);
    }

    public function addApi(Request $request){
        $request->validate([
        'nome' => 'required|string|max:255',
        'dataNascimento' => 'required|date',
        'email' => 'required|email|unique:autores,email',
        'telefone' => 'required|string|max:20',
    ]);
        
    $autor = Autores::create([
        'nome' => $request->nome,
        'dataNascimento' => $request->dataNascimento,
        'email' => $request->email,
        'telefone' => $request->telefone,
    ]);

        return response()->json([
            'message' => 'Autor Criado',
            'autor' => $autor
        ], 200);
    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:autores,email',
            'telefone' => 'required|string|max:20',
        ]);

        $autor = Autores::findOrFail($id); 

        $autor->nome = $request->nome; 
        $autor->dataNascimento = $request->dataNascimento;
        $autor->email = $request->email;
        $autor->telefone = $request->telefone;

        $autor->save(); 

        return response()->json([
            'message' => "Autor Atualizado!",
            'autor' => $autor
        ], 200);
    }

    public function deletarApi($id){
        $autor = Autores::findOrFail($id); 
        $autor->delete(); 

        return response()->json([
            'message' => "Autor Deletado com Sucesso!",
            'autor' => $autor
        ], 200);
    }
}