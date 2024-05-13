<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_autor()
    {
        $response = $this->postJson('/api/autores', [
            'nome' => 'Autor 123',
            'data_nascimento' => '1990-01-01',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('autores', ['nome' => 'Autor 123']);
    }

}
