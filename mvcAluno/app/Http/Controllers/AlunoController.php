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
     
     public function atualizar($id){
        $aluno = Aluno::findOrFail($id); //Busca o alno pelo id
        return view('atualizar', compact('aluno'));
     }

     public function update(request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);
        
        $aluno = Aluno::findOrFail($id); //buscar aluno para ser atualizado 
        $aluno->nome = $request->nome;//atualizando campo nome
        $aluno->email = $request->email;//atualizando campo email

        $aluno->save(); //salvando o banco de dados 
        return redirect()->back()->with('success','Aluno atualizado com sucesso');
     }

     public function deletar($id){
        $aluno = Aluno::findOrFail($id); //Buscar o aluno para depois deletar
        $aluno->delete(); //faz o delete no banco de dados 

        return redirect()->route('aluno.listar')->with('sucess','Aluno excluido com sucesso!');
     } // recarregar a tela 


    }
?>