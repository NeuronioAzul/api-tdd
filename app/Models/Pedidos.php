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
    protected $fillable = ['codigo_do_cliente', 'codigo_do_produto', 'data_criacao'];

    // Relacionamento com Cliente
    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function itensDosPedidos()
    {
        return $this->hasMany(ItemsDosPedidos::class, 'pedido_id');
    }

}
