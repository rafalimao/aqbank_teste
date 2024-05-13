<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmprestimoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_emprestimo()
    {
        $usuario = factory(\App\Models\User::class)->create();
        $livro = factory(\App\Models\Livro::class)->create();

        $response = $this->postJson('/api/emprestimos', [
            'user_id' => $usuario->id,
            'livro_id' => $livro->id,
            'data_emprestimo' => now()->format('Y-m-d'),
            'data_devolucao' => now()->addDays(7)->format('Y-m-d'),
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('emprestimos', ['user_id' => $usuario->id, 'livro_id' => $livro->id]);
    }

}
