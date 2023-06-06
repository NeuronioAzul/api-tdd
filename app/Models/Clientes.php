<?php

namespace App\Models;

use Database\Factories\ClientesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory, SoftDeletes;

    protected $factory = ClientesFactory::class;
    protected $fillable = ['nome', 'email', 'telefone', 'data_nascimento', 'endereco', 'complemento', 'bairro', 'cep', 'data_cadastro'];

    // realacionament with Pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'codigo_cliente', 'id');
    }

}
