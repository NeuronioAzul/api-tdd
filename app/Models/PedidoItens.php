<?php

namespace App\Models;

use Database\Factories\PedidoItensFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItens extends Model
{
    use HasFactory, SoftDeletes;

    protected $factory = PedidoItensFactory::class;
    protected $fillable = ['pedido_id', 'produto_id', 'quantidade'];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedidos::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produtos::class);
    }
}
