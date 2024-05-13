<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            // chave estrangeira para usuário
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // chave estrangeira para  livro
            $table->foreignId('livro_id')->constrained()->onDelete('cascade');
            $table->dateTime('data_emprestimo');
            $table->dateTime('data_devolucao');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
