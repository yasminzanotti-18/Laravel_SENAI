<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar'); //acessar o banco 

route::get('aluno/cadastrar', function(){ //não precisa acessar o banco 
    return view('cadastro');
})->name('aluno.cadastro');

//POST-enviar os dados para cadastrar usuários
Route::post('/aluno/salvar', [AlunoController::class, 'add'])->name('aluno.salvar');
