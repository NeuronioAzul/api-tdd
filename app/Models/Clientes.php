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
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_de_nascimento',
        'endereco',
        'complemento',
        'bairro',
        'cep',
        'data_de_cadastro'
    ];

    // realacionamento com Pedidos
    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class, 'cliente_id', 'id');
    }

}
