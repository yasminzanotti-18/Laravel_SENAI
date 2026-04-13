<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar'); //acessar o banco 

route::get('aluno/cadastrar', [AlunoController::class, 'cadastro'])->name('aluno.cadastro');

//POST-enviar os dados para cadastrar usuários
Route::post('/aluno/salvar', [AlunoController::class, 'add'])->name('aluno.salvar');


//Tela de Atualizar
Route::get('/aluno/{id}/atualizar', [AlunoController::class,'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('aluno.update');

Route::delete('/aluno/{id}', [AlunoController::class, 'deletar'])->name('aluno.deletar');

Route::get('/turma/cadastrar', function(){ //não precisa acessar o banco 
    return view('cadastroTurma');
})->name('turma.cadastro');

Route::post('/turma/salvar', [TurmaController::class, 'add'])->name('turma.salvar');


