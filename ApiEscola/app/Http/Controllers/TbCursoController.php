<?php

namespace App\Http\Controllers;

use App\Models\tbCurso;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TbCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = tbCurso::all();

        $contador = $registros->count();

        if($contador > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Cursos encontrados com sucesso',
                'data' => $registros,
                'total' => $contador
            ], 200); //Retorna HTTP 200 (OK) com os dados e a contagem
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nenhum curso encontrado',
            ], 404); //Retorna HTTP 404 (Not Found) se não houver registros
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'valor' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar curso',
                'errors' => $validator->errors()
            ], 422); //Retorna HTTP 422 (Unprocessable Entity) se a validação falhar
        }

        $registros = TbCurso::create($request->all());

        if ($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Curso cadastrado com sucesso',
                'data' => $registros
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar curso',
            ], 500); //Retorna HTTP 500 (Internal Server Error) se o cadastro falhar
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registros = TbCurso::find($id);

        if($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Curso encontrado com sucesso',
                'data' => $registros
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Curso não encontrado',	
            ], 404); //Retorna HTTP 404 (Not Found) se o aluno não for encontrada
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'valor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400); //retorna HTTP 400 se houver erro de validação
        }

        $registrosBanco = TbCurso::find($id);

        if (!$registrosBanco) {
            return response()->json([
                'success' => false,
                'message' => 'Curso não encontrado',
            ], 404);
        }

        $registrosBanco->nome = $request->nome;
        $registrosBanco->valor = $request->valor;

        if($registrosBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Curso atualizado com sucesso',
                'data' => $registrosBanco
            ], 200); //Retorna HTTP 200 se a atualização for bem-sucedida
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar o curso',
            ], 500); //Retorna HTTP 500 se houver erro ao salvar
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registros = tbCurso::find($id);

        if(!$registros) {
            return response()->json([
                'success' => false,
                'message' => 'Curso não encontrado',
            ], 404); //Retorna HTTP 404 se o aluno não for encontrado
        }


        if($registros->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Curso deletado com sucesso'
            ], 200); //retorna HTTP 200 se a exclusão for bem-sucedida
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar o curso'
        ], 500);
    }
}
