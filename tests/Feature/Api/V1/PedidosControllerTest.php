<?php

namespace Tests\Feature\Api\V1;

use App\Models\Clientes;
use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PedidosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_pedidos_v1_endpoint(): void
    {
        $response = $this->get('/api/v1/pedidos');
        $response->assertStatus(200);
    }

    public function test_get_pedidos_v1_endpoint_json(): void
    {
        $response = $this->getJson('/api/v1/pedidos');
        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([]);
    }

    public function test_get_pedidos_endpoint_paginated_with_five_itens()
    {
        $clientes = Clientes::factory(5)->create();
        $produtos = Produtos::factory(5)->create();
        $pedidos = Pedidos::factory(5)->create();

        $response = $this->getJson('/api/v1/pedidos');
        $response->assertStatus(200);
        $response->assertJsonCount(5, '0.data');
    }

    public function test_get_pedidos_endpoint_with_id_return_one()
    {
        $clientes = Clientes::factory(5)->create();
        $produtos = Produtos::factory(5)->create();
        $pedidos = Pedidos::factory(5)->create();

        $response = $this->getJson('/api/v1/pedidos/1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'cliente_id',
            "data_criacao",
            "produto" => [
                "id",
                "nome",
                "preco",
                "foto",
                "deleted_at",
                "created_at",
                "updated_at",
            ],
            "cliente" => [
                "id",
                "nome",
                "email",
                "telefone",
                "data_de_nascimento",
                "endereco",
                "complemento",
                "bairro",
                "cep",
                "data_de_cadastro",
                "deleted_at",
                "created_at",
                "updated_at"
            ],
            '_links' => [
                '*' => [
                    'rel',
                    'type',
                    'href'
                ]
            ]
        ]);
    }

    function test_get_pedidos_endpoint_json_format()
    {
        $clientes = Clientes::factory(5)->create();
        $produtos = Produtos::factory(5)->create();
        $pedidos = Pedidos::factory(5)->create();

        $response = $this->getJson('/api/v1/pedidos');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'current_page',
            0 => [
                'data' => [
                    '*' => [
                        'id',
                        'cliente_id',
                        "data_criacao",
                        '_links' => [
                            '*' => [
                                'rel',
                                'type',
                                'href'
                            ]
                        ]
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ]
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ],
        ]);
    }

}
