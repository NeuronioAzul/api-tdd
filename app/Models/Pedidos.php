<?php

namespace App\Models;

use Database\Factories\PedidosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use HasFactory, SoftDeletes;

    protected $factory = PedidosFactory::class;
    protected $fillable = ['cliente_id', 'data_criacao'];

    // Relacionamento com Cliente
    public function clientes(): HasOne
    {
        return $this->hasOne(Clientes::class, 'id', 'cliente_id');
    }

    // Relacionamento com PedidoItens
    public function pedidoItens(): HasMany
    {
        return $this->hasMany(PedidoItens::class, 'pedido_id', 'id');
    }
}
