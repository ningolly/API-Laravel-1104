<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbAlunoController;
use App\Http\Controllers\TbCursoController;
use App\Http\Controllers\TbTurmaController;

//Aluno

//Rotas para visualizar os registros (get)
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/alunos', [TbAlunoController::class, 'index']);
Route::get('/aluno/{id}',[TbAlunoController::class,'show']);

//Rota para inserir registros (post)
Route::post('/aluno',[TbAlunoController::class,'store']);

//Rota para alterar os registros (put)
Route::put('/aluno/{id}',[TbAlunoController::class,'update']);

//Rota para excluir o resgistro (delete)
Route::delete('/aluno/{id}',[TbAlunoController::class,'destroy']);

//Curso

//Rotas para visualizar os registros (get)
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/cursos', [TbCursoController::class, 'index']);
Route::get('/curso/{id}',[TbCursoController::class,'show']);

//Rota para inserir registros (post)
Route::post('/curso',[TbCursoController::class,'store']);

//Rota para alterar os registros (put)
Route::put('/curso/{id}',[TbCursoController::class,'update']);

//Rota para excluir o resgistro (delete)
Route::delete('/curso/{id}',[TbCursoController::class,'destroy']);

//Turma

//Rotas para visualizar os registros (get)
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/turmas', [TbTurmaController::class, 'index']);
Route::get('/turma/{id}',[TbTurmaController::class,'show']);

//Rota para inserir registros (post)
Route::post('/turma',[TbTurmaController::class,'store']);

//Rota para alterar os registros (put)
Route::put('/turma/{id}',[TbTurmaController::class,'update']);

//Rota para excluir o resgistro (delete)
Route::delete('/turma/{id}',[TbTurmaController::class,'destroy']);