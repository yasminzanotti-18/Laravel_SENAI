<?php
 namespace App\Http\Controllers;
 use App\Models\Aluno;

 use Illuminate\Http\Request;

 class AlunoController extends controller{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get(); // mesma coisa que  select * from alunos
        return view('listar', compact( 'alunos'));
    }

    
    public function add(Request $request){
        $request->validate([ //validando os caracteres
            'nome'=>'required|string|max:255',
            'email' =>'required|string|max:255|unique:alunos,email'
        ]);
    Aluno::create([ //está criando 
        'nome'=>$request->nome,
        'email'=>$request->email
    ]);
    return redirect()->back()->with('sucess','Aluno cadastrado com sucesso!');
     }
 }
?>