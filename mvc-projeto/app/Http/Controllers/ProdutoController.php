<?php
 namespace App\Http\Controllers;
 use App\Models\Produto;

 use Illuminate\Http\Request;

 class ProdutoController extends controller{
    public function listar(){
        $query = Produto::query();
        $alunos = $query->get(); // mesma coisa que  select * from alunos
        return view('listar', compact( 'produtos'));
    }
 }
?>