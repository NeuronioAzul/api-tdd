<?php

namespace Tests\Feature\Api\V1;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testClientesEndpointGet(): void
    {
        $response = $this->getJson('/api/v1/clientes');
        $response->assertStatus(200);
    }

    public function testClientesEndpointGetWithCreationFactoryData()
    {
        Clientes::factory(5)->create();
        $response = $this->getJson('/api/v1/clientes');
        $response->assertStatus(200);
        $response->assertJsonCount(5, '0.data');
    }

    public function testClientesEndpointGetSelectOne()
    {
        $cliente = Clientes::factory(1)->createOne();

        $response = $this->getJson('/api/v1/clientes/'.$cliente->id);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($cliente) {
            $json->hasAll([
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
                "_links",
            ]);

            $json->whereAllType([
                "id" => 'integer',
                "nome" => 'string',
                "email" => 'string',
                "telefone" => 'string',
                "data_de_nascimento" => 'string',
                "endereco" => 'string',
                "complemento" => 'string|null',
                "bairro" => 'string',
                "cep" => 'string',
                "data_de_cadastro" => 'string',
                "_links" => 'array',
            ]);

            $json->whereAll([
                "id" => $cliente->id,
                "nome" => $cliente->nome,
                "email" => $cliente->email,
                "telefone" => $cliente->telefone,
                "data_de_nascimento" => $cliente->data_de_nascimento,
                "endereco" => $cliente->endereco,
                "complemento" => $cliente->complemento,
                "bairro" => $cliente->bairro,
                "cep" => $cliente->cep,
                "data_de_cadastro" => $cliente->data_de_cadastro,
                "_links" => [
                    [
                        'href' => 'http://localhost/api/v1/clientes/'.$cliente->id,
                        'rel' => 'self',
                        'type' => 'GET',
                    ],
                    [
                        'href' => 'http://localhost/api/v1/clientes',
                        'rel' => 'index',
                        'type' => 'GET',
                    ],
                    [
                        'href' => 'http://localhost/api/v1/clientes',
                        'rel' => 'store',
                        'type' => 'POST',
                    ],
                    [
                        'href' => 'http://localhost/api/v1/clientes/'.$cliente->id,
                        'rel' => 'update',
                        'type' => 'PATCH',
                    ],
                    [
                        'href' => 'http://localhost/api/v1/clientes/'.$cliente->id,
                        'rel' => 'destroy',
                        'type' => 'DELETE',
                    ],
                ],
            ]);
        });
    }

    public function testClientesEndpointGetSelectOneJsonFormatHATEOAS()
    {
        Clientes::factory()->createOne();

        $response = $this->getJson('/api/v1/clientes/1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'nome',
            'email',
            'telefone',
            'data_de_nascimento',
            'endereco',
            'complemento',
            'bairro',
            'cep',
            'data_de_cadastro',
            '_links' => [
                '*' => [
                    'rel',
                    'type',
                    'href'
                ]
            ]
        ]);
    }

    public function testClientesEndpointGetFiveItensPaginatedJsonFormat()
    {
        $clientes = Clientes::factory(5)->create();
        $response = $this->getJson('/api/v1/clientes');
        $response->assertStatus(200);

        // Assert the structure of the response JSON
        $response->assertJsonStructure([
            'current_page',
            0 => [
                'data' => [
                    '*' => [
                        'id',
                        'nome',
                        'email',
                        'telefone',
                        'data_de_nascimento',
                        'endereco',
                        'complemento',
                        'bairro',
                        'cep',
                        'data_de_cadastro',
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

    public function testClientesEndpointPostToStore()
    {
        $cliente = Clientes::factory(1)->makeOne()->toArray();

        $response = $this->postJson('api/v1/clientes', $cliente);

        $response->assertStatus(201);

        $response->assertJson(function (AssertableJson $json) use ($cliente) {
            $json->hasAll(
                [
                    'id',
                    'nome',
                    'email',
                    'telefone',
                    'data_de_nascimento',
                    'endereco',
                    'complemento',
                    'bairro',
                    'cep',
                    'data_de_cadastro'
                ]
            );

            $json->whereAll([
                'id' => 1,
                'nome' => $cliente['nome'],
                'email' => $cliente['email'],
                'telefone' => $cliente['telefone'],
                'data_de_nascimento' => $cliente['data_de_nascimento'],
                'endereco' => $cliente['endereco'],
                'complemento' => $cliente['complemento'],
                'bairro' => $cliente['bairro'],
                'cep' => $cliente['cep'],
                'data_de_cadastro' => $cliente['data_de_cadastro'],
                '_links' => [
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'self',
                        'type' => 'GET',
                    ],
                    [
                        'href' => url('/api/v1/clientes'),
                        'rel' => 'index',
                        'type' => 'GET',
                    ],
                    [
                        'href' => url('/api/v1/clientes'),
                        'rel' => 'store',
                        'type' => 'POST',
                    ],
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'update',
                        'type' => 'PATCH',
                    ],
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'destroy',
                        'type' => 'DELETE',
                    ],
                ],
            ])->etc();
        });
    }

    public function testClientesEndpointPut()
    {
        $nCliente = Clientes::factory(1)->createOne();

        $arrCliente = Clientes::factory(1)->makeOne()->toArray();

        $response = $this->putJson('api/v1/clientes/'.$nCliente->id, $arrCliente);

        $response->assertStatus(201);

        $response->assertJson(function (AssertableJson $json) use ($arrCliente) {
            $json->hasAll(
                [
                    'id',
                    'nome',
                    'email',
                    'telefone',
                    'data_de_nascimento',
                    'endereco',
                    'complemento',
                    'bairro',
                    'cep',
                    'data_de_cadastro'
                ]
            );

            $json->whereAll([
                'id' => 1,
                'nome' => $arrCliente['nome'],
                'email' => $arrCliente['email'],
                'telefone' => $arrCliente['telefone'],
                'data_de_nascimento' => $arrCliente['data_de_nascimento'],
                'endereco' => $arrCliente['endereco'],
                'complemento' => $arrCliente['complemento'],
                'bairro' => $arrCliente['bairro'],
                'cep' => $arrCliente['cep'],
                'data_de_cadastro' => $arrCliente['data_de_cadastro'],
                '_links' => [
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'self',
                        'type' => 'GET',
                    ],
                    [
                        'href' => url('/api/v1/clientes'),
                        'rel' => 'index',
                        'type' => 'GET',
                    ],
                    [
                        'href' => url('/api/v1/clientes'),
                        'rel' => 'store',
                        'type' => 'POST',
                    ],
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'update',
                        'type' => 'PATCH',
                    ],
                    [
                        'href' => url('/api/v1/clientes/1'),
                        'rel' => 'destroy',
                        'type' => 'DELETE',
                    ],
                ],
            ])->etc();
        });
    }

    public function testClientesEndpointPatch()
    {
        Clientes::factory(1)->createOne();

        $cliente = [
            'nome' => 'Zé das Coves',
        ];

        $response = $this->patchJson('api/v1/clientes/1', $cliente);

        $response->assertStatus(201);

        $response->assertJson(function (AssertableJson $json) use ($cliente) {
            $json->hasAll(
                [
                    'id',
                    'nome',
                    'email',
                    'telefone',
                    'data_de_nascimento',
                    'endereco',
                    'complemento',
                    'bairro',
                    'cep',
                    'data_de_cadastro'
                ]
            )->etc();

            $json->where('nome', $cliente['nome']);
        });
    }

    public function testClientesEndpointDelete()
    {
        $cliente = Clientes::factory(1)->createOne();

        $response = $this->deleteJson('/api/v1/clientes/'.$cliente->id);

        $response->assertStatus(204);
    }
}
