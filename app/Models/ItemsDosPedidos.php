<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsDosPedidos extends Model
{
    use HasFactory;

    protected $table = 'itens_do_pedido';

    protected $primaryKey = 'item_id';

    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class, 'pedido_id');
    }

    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'produto_id');
    }
}
