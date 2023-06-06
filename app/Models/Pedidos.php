<?php

namespace App\Models;

use Database\Factories\PedidosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use HasFactory, SoftDeletes;

    protected $factory = PedidosFactory::class;
    protected $fillable = ['codigo_cliente', 'codigo_produto', 'data_criacao'];

    // Relacionamento com Cliente
    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'codigo_cliente', 'id');
    }

    // Relacionamento com Produto
    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'codigo_produto', 'id');
    }
}
