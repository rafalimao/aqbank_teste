<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Livro;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\LivroEmprestado;

class EmprestimoController extends Controller
{
    /**
     * Lista todos os empréstimos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $emprestimos = Emprestimo::all();
        return response()->json($emprestimos);
    }

    /**
     * Registra um novo empréstimo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $emprestimo = Emprestimo::create([
            'user_id' => $request->user_id,
            'livro_id' => $request->livro_id,
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
        ]);
        
        // Fila para o envio de email
        $livro = Livro::find($request->livro_id);
        $usuario = User::find($request->user_id);
        Mail::to($usuario)->queue(new LivroEmprestado($livro));
                
        return response()->json($emprestimo, 201);
    }

    /**
     * Exibe um empréstimo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        return response()->json($emprestimo);
    }
}
