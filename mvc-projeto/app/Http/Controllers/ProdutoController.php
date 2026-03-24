<?php
 namespace App\Http\Controllers;
 use App\Models\Produto;

 use Illuminate\Http\Request;

 class ProdutoController extends controller{
    public function listar(){
        $query = Produto::query();
        $produtos = $query->get(); // mesma coisa que  select * from alunos
        return view('listar', compact( 'produtos'));
    }
public function add(Request $request){
        $request->validate([ //validando os caracteres
            'nome'=>'required|string|max:255',
            'preco' =>'required|string|max:255|unique:produtos,preco',
            'quantidade'=>'required|string|max:255'
        ]);
    Produto::create([ //está criando 
        'nome'=>$request->nome,
        'preco'=>$request->preco,
        'quantidade'=>$request->quantidade
    ]);
    return redirect()->back()->with('sucess','Produto cadastrado com sucesso!');
     }
     
     public function atualizar($id){
        $produto = Produto::findOrFail($id); //Busca o produto pelo id
        return view('atualizar', compact('produto'));
     }

     public function update(request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => "required|string|max:255",
            'quantidade' => 'required|string|max:255',
        ]);
        
        $produto = Produto::findOrFail($id); //buscar produto para ser atualizado 
        $produto->nome = $request->nome;//atualizando campo nome do produto 
        $produto->preco = $request->preco;//atualizando campo preco
        $produto->quantidade = $request->quantidade;

        $produto->save(); //salvando o banco de dados 
        return redirect()->back()->with('success','Produto atualizado com sucesso');
     }
    }
?>



 





