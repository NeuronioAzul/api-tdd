<?php

namespace Tests\Feature\Api;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    /**
     * Test get clientes endpoint
     */
    public function test_get_clientes_endpoint(): void
    {
        $clientes = Clientes::factory(3)->create();

        $response = $this->getJson('/api/v1/clientes');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
