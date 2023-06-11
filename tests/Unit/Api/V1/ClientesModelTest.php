<?php

namespace Tests\Unit\Api\V1;

use App\Models\Clientes;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\CreatesApplication;

class ClientesModelTest extends TestCase
{

    use RefreshDatabase;

    public function testModelClientesInsert()
    {
        $data = [
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '1990-01-01',
            'endereco' => '123 Street',
            'complemento' => null,
            'bairro' => 'Central',
            'cep' => '12345',
        ];

        $cliente = new Clientes();

        $cliente = $cliente->create($data);

        $this->assertInstanceOf(Clientes::class, $cliente);
        $this->assertEquals($data['nome'], $cliente->nome);
        $this->assertEquals($data['email'], $cliente->email);
    }

    public function testCriateClienteWithFactory()
    {
        // criar um clientes usando a factory na model Clientes
        $cliente = Clientes::factory(1)->createOne();
        $this->assertInstanceOf(Clientes::class, $cliente);
        //testar se o cliente foi criado
        $this->assertInstanceOf(Clientes::class, $cliente);

        // cadastrar cliente no banco de dados usando os dados passados via array
        $clienteData = [
            'nome' => 'John Doe',
            'email' => 'aaa@sdss.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '1990-01-01',
            'endereco' => '123 Main Street',
            'complemento' => 'Apartment 4B',
            'bairro' => 'Central',
            'cep' => '12345-678',
            'data_de_cadastro' => now(),
        ];

        $cliente = Clientes::create($clienteData);

        $this->assertInstanceOf(Clientes::class, $cliente);
        $this->assertDatabaseHas('clientes', $clienteData);

    }

    public function testCriarCliente()
    {
        $clienteData = [
            'nome' => 'John Doe',
            'email' => 'johndoe@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '1990-01-01',
            'endereco' => '123 Main Street',
            'complemento' => 'Apartment 4B',
            'bairro' => 'Central',
            'cep' => '12345-678',
            'data_de_cadastro' => now(),
        ];

        $cliente = Clientes::create($clienteData);

//        $cliente = new Clientes($clienteData);
//        $cliente->save();

        $this->assertInstanceOf(Clientes::class, $cliente);
        $this->assertDatabaseHas('clientes', $clienteData);
    }

    public function testAtualizarCliente()
    {
        $cliente = Clientes::factory()->create();

        $novoNome = 'Jane Smith';
        $cliente->nome = $novoNome;
        $cliente->save();

        $this->assertEquals($novoNome, $cliente->nome);
    }

    public function testExcluirCliente()
    {
        $cliente = Clientes::factory()->create();

        $cliente->delete();

        $this->assertSoftDeleted('clientes', ['id' => $cliente->id]);
    }

    public function testBuscarCliente()
    {
        $cliente = Clientes::factory()->create();

        $clienteEncontrado = Clientes::find($cliente->id);

        $this->assertInstanceOf(Clientes::class, $clienteEncontrado);
        $this->assertEquals($cliente->id, $clienteEncontrado->id);
    }

    public function testAtualizarDataCadastro()
    {
        $cliente = Clientes::factory()->create();

        $novaDataCadastro = now()->subDays(7);
        $cliente->data_de_cadastro = $novaDataCadastro;
        $cliente->save();

        $clienteAtualizado = Clientes::find($cliente->id);

        $this->assertEquals($novaDataCadastro, $clienteAtualizado->data_de_cadastro);
    }

    public function testCampoObrigatorioNome()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '202311/022226/1222220', // Formato inválido de data
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testFormatoDataNascimentoInvalido()
    {
        // Cenário de teste
        $data = [
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '202311/022226/1222220', // Formato inválido de data
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ];

        $cliente = Clientes::create($data);

        $this->assertFalse($cliente);
        $this->assertDatabaseMissing('clientes', ['nome' => 'John Doe']);
    }
}

