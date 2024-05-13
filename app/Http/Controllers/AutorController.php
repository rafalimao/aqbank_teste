<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Validator;

class AutorController extends Controller
{
    /**
     * Lista todos os autores.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $autores = Autor::all();
        return response()->json($autores);
    }

    /**
     * Cria um novo autor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $autor = Autor::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return response()->json($autor, 201);
    }

    /**
     * Exibe um autor específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return response()->json($autor);
    }

    /**
     * Atualiza os dados de um autor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $autor = Autor::findOrFail($id);
        $autor->update([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return response()->json($autor, 200);
    }

    /**
     * Deleta um autor específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(['message' => 'Autor deletado com sucesso']);
    }
}
