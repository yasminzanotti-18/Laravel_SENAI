<?php

namespace App\Http\Controllers;
use App\Models\Producoes;

use Illuminate\Http\Request;

class ProducoesController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'materia_prima' => 'required|string|max:255',
            'dataFabricacao' => 'required|date',
            'quantidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0',
        ]);

        Producoes::create([
            'nomeProduto' => $request->nomeProduto,
            'materia_prima' => $request->materia_prima,
            'dataFabricacao' => $request->dataFabricacao,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco
        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function listar(Request $request){
        try{
        $query = Producoes::query();

        
        if($request->filled('nomeProduto')){
            $query->where('nomeProduto', 'like', '%'.$request->nomeProduto .'%');
        }
        
        if($request->filled('dataFabricacao')){
            $query->whereDate('dataFabricacao', $request->dataFabricacao);
        }

        
        if($request->filled('materia_prima')){
            $query->where('materia_prima', 'like', '%'.$request->materia_prima .'%');
        }

        $producoes = $query->get();

        return view('listar', compact('producoes'));

       } catch(\Exception $e){
            return response()->json([
                'producoes' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);
        }
    }
   
}