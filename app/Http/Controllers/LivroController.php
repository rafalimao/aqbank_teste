<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Validator;

class LivroController extends Controller
{
    /**
     * Lista todos os livros.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $livros = Livro::all();
        return response()->json($livros);
    }

    /**
     * Cria um novo livro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'autor_id' => 'required|exists:autores,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'autor_id' => $request->autor_id,
        ]);

        return response()->json($livro, 201);
    }

    /**
     * Exibe um livro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $livro = Livro::findOrFail($id);
        return response()->json($livro);
    }

    /**
     * Atualiza os dados de um livro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'autor_id' => 'required|exists:autores,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $livro = Livro::findOrFail($id);
        $livro->update([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'autor_id' => $request->autor_id,
        ]);

        return response()->json($livro, 200);
    }

    /**
     * Deleta um livro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return response()->json(['message' => 'Livro deletado com sucesso']);
    }
}
