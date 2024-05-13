<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_livro()
    {
        $autor = factory(\App\Models\Autor::class)->create();

        $response = $this->postJson('/api/livros', [
            'titulo' => 'Test Livro',
            'ano_publicacao' => 2022,
            'autor_id' => $autor->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('livros', ['titulo' => 'Test Livro']);
    }

}
