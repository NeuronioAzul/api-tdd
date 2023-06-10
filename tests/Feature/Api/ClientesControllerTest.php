<?php

namespace Tests\Feature\Api;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * Test get clientes endpoint
     */
    public function test_get_clientes_endpoint(): void
    {
        $response = $this->get('/api/v1/clientes', ['accept' => 'application/json']);
        $response->assertStatus(200);
    }

    public function test_get_clientes_endpoint_with_creation_factory_data()
    {
        Clientes::factory(5)->create();
        $response = $this->getJson('/api/v1/clientes');
        $response->assertStatus(200);
        $response->assertJsonCount(5, '0.data');
    }

    public function test_get_clientes_endpoint_passing_id_json_format()
    {
        Clientes::factory(5)->create();

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

    /**
     * Test the API endpoint for retrieving paginated list of clientes.
     *
     * @return void
     */
    public function test_get_clientes_endpoint_json_format()
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






//        $response->assertJson(function (AssertableJson $json) use ($clientes) {
//            $json->whereType('0.id', 'integer');
//
//            $json->whereAllType([
//                '0.id',
//                'integer',
//                '0.nome',
//                'string'
//            ]);
//
//            $json->hasAll(['0.current_page', '0.current_page', '0.current_page']);
//
//            $clientes = $clientes->first();
//
//            $json->whereAll([
//                '0.id' => $clientes->id,
//                '0.nome' => $clientes->nome
//            ]);
//        });


}
