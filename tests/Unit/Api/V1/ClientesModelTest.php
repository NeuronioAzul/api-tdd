<?php

namespace Tests\Unit\Api\V1;

use App\Models\Clientes;
use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientesModelTest extends TestCase
{

    use RefreshDatabase;

    public function testClienteCreateAndValidateInsertedData()
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

    public function testClienteCreateWithFactory()
    {
        $cliente = Clientes::factory(1)->createOne();
        $this->assertInstanceOf(Clientes::class, $cliente);
    }

//    public function testClienteShoudHavePedido()
//    {
//        $cliente = Clientes::factory()->create();
//        $produto = Produtos::factory()->create();
//        $pedido = Pedidos::factory()->create([
//            'codigo_do_cliente' => $cliente->id,
//            'codigo_do_produto'=>$produto->id,
//        ]);
//
//        dd($cliente);
//
//        $this->assertInstanceOf(Pedidos::class, $cliente->pedidos);
//    }


    public function testClienteCreate()
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

        $this->assertInstanceOf(Clientes::class, $cliente);
        $this->assertDatabaseHas('clientes', $clienteData);
    }

    public function testClienteUpdate()
    {
        $cliente = Clientes::factory()->create();

        $novoNome = 'João das Couves';
        $cliente->nome = $novoNome;
        $cliente->save();

        $this->assertEquals($novoNome, $cliente->nome);
    }

    public function testClienteSoftDelete()
    {
        $cliente = Clientes::factory()->create();

        $cliente->delete();

        $this->assertSoftDeleted('clientes', ['id' => $cliente->id]);
    }

    public function testClienteSearchById()
    {
        $cliente = Clientes::factory()->create();

        $clienteEncontrado = Clientes::find($cliente->id);

        $this->assertInstanceOf(Clientes::class, $clienteEncontrado);
        $this->assertEquals($cliente->id, $clienteEncontrado->id);
    }

    public function testClienteUpdateDataCadastro()
    {
        $cliente = Clientes::factory()->create();

        $novaDataCadastro = now()->subDays(7);
        $cliente->data_de_cadastro = $novaDataCadastro;
        $cliente->save();

        $clienteAtualizado = Clientes::find($cliente->id);

        $this->assertEquals($novaDataCadastro, $clienteAtualizado->data_de_cadastro);
    }

    public function testClienteRequiredFieldNome()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            // 'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testClienteRequiredFieldEmail()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
//            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testClienteRequiredFieldTelefone()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
            'email' => 'john@example.com',
//            'telefone' => '123456789',
            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testClienteRequiredFieldDataDeNascimento()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
//            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testClienteRequiredFieldBairro()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
//            'bairro' => 'Central',
            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }

    public function testClienteRequiredFieldCep()
    {
        $this->expectException(QueryException::class);

        $cliente = new Clientes([
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '123456789',
            'data_de_nascimento' => '2000-01-01',
            'endereco' => '123 Street',
            'complemento' => '',
            'bairro' => 'Central',
//            'cep' => '12345',
            "data_de_cadastro" => "2023-06-11 03:46:20",
        ]);
        $cliente->save();
    }



}

