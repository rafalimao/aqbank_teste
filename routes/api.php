<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas de Autenticação
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

// Rotas protegidas por autenticação 
Route::group(['middleware' => 'jwt.auth'], function () {
    // Rotas de Autores
    Route::get('autores', 'AutorController@index');
    Route::post('autores', 'AutorController@store');
    Route::get('autores/{id}', 'AutorController@show');
    Route::put('autores/{id}', 'AutorController@update');
    Route::delete('autores/{id}', 'AutorController@destroy');

    // Rotas de Livros
    Route::get('livros', 'LivroController@index');
    Route::post('livros', 'LivroController@store');
    Route::get('livros/{id}', 'LivroController@show');
    Route::put('livros/{id}', 'LivroController@update');
    Route::delete('livros/{id}', 'LivroController@destroy');

    // Rotas de Empréstimos
    Route::get('emprestimos', 'EmprestimoController@index');
    Route::post('emprestimos', 'EmprestimoController@store');
    Route::get('emprestimos/{id}', 'EmprestimoController@show');
});