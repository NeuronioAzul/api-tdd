<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;

class ClientesApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetClientesStatus(): void
    {
        $response = $this->get('/api/v1/clientes');

        $response->assertStatus(200);
    }
}
