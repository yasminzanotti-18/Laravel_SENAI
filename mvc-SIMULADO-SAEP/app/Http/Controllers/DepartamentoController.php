<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function listar(){
        $departamentos = Departamento::get();
        return view('listarDepartamentos', compact('departamentos'));
    }

    public function cadastro(){
        return view('cadastroDepartamento');
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'orcamento' => 'required|numeric',
            'data_criacao' => 'required|date'
        ]);

        Departamento::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'orcamento' => $request->orcamento,
            'data_criacao' => $request->data_criacao
        ]);

        return redirect()->back()->with('success','Departamento cadastrado com sucesso!');
    }

    public function atualizar($id){
        $departamento = Departamento::findOrFail($id);
        return view('atualizarDepartamento', compact('departamento'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'orcamento' => 'required|numeric',
            'data_criacao' => 'required|date'
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->nome = $request->nome;
        $departamento->sigla = $request->sigla;
        $departamento->orcamento = $request->orcamento;
        $departamento->data_criacao = $request->data_criacao;

        $departamento->save();

        return redirect()->back()->with('success','Departamento atualizado com sucesso!');
    }

    public function deletar($id){
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();

        return redirect()->route('departamento.listar')
            ->with('success','Departamento excluído com sucesso!');
    }
}