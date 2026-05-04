<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DadosPessoaisController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/departamento/listar',[DepartamentoController::class, 'listar'])
    ->name('departamento.listar');

Route::get('/departamento/cadastrar',[DepartamentoController::class, 'cadastro'])
    ->name('departamento.cadastro');

Route::post('/departamento/salvar',[DepartamentoController::class, 'add'])
    ->name('departamento.salvar');

Route::get('/departamento/{id}/atualizar',[DepartamentoController::class, 'atualizar'])
    ->name('departamento.atualizar');

Route::put('/departamento/{id}/update',[DepartamentoController::class, 'update'])
    ->name('departamento.update');

Route::delete('/departamento/{id}',[DepartamentoController::class, 'deletar'])
    ->name('departamento.deletar');

Route::get('/funcionario/listar',[FuncionarioController::class, 'listar'])
    ->name('funcionario.listar');

Route::get('/funcionario/cadastrar',[FuncionarioController::class, 'cadastro'])
    ->name('funcionario.cadastro');

Route::post('/funcionario/salvar',[FuncionarioController::class, 'add'])
    ->name('funcionario.salvar');

Route::get('/funcionario/{id}/atualizar',[FuncionarioController::class, 'atualizar'])
    ->name('funcionario.atualizar');

Route::put('/funcionario/{id}/update',[FuncionarioController::class, 'update'])
    ->name('funcionario.update');

Route::delete('/funcionario/{id}',[FuncionarioController::class, 'deletar'])
    ->name('funcionario.deletar');


