<?php

namespace App\Http\Controllers;
use App\Models\DadosPessoais;
use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::with('departamentos')->get();
        return view('listarFuncionarios', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::get();
        return view('cadastroFuncionario', compact('departamentos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'data_admissao' => 'required|date',
            'salario' => 'required|numeric'
        ]);

        $funcionario = Funcionario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'data_admissao' => $request->data_admissao,
            'salario' => $request->salario,
            'departamento_id' => $request->departamento_id
        ]);

         DadosPessoais::create([
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'data_nascimento' => $request->data_nascimento,
            'cep' => $request->cep,
            'funcionario_id' => $funcionario->id
         ]);

        return redirect()->back()->with('success','Funcionário cadastrado com sucesso!');
    }

    public function atualizar($id){
        $funcionario = Funcionario::findOrFail($id);
        return view('atualizarFuncionario', compact('funcionario'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => "required|email|unique:funcionarios,email,$id",
            'data_admissao' => 'required|date',
            'salario' => 'required|numeric'
        ]);

        $funcionario = Funcionario::findOrFail($id);

        $funcionario->nome = $request->nome;
        $funcionario->sobrenome = $request->sobrenome;
        $funcionario->cargo = $request->cargo;
        $funcionario->email = $request->email;
        $funcionario->data_admissao = $request->data_admissao;
        $funcionario->salario = $request->salario;

        $funcionario->save();

        return redirect()->back()->with('success','Funcionário atualizado com sucesso!');
    }

    public function deletar($id){
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionario.listar')
            ->with('success','Funcionário excluído com sucesso!');
    }
}