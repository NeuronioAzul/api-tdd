<?php

namespace App\Models;

use Database\Factories\ProdutosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use HasFactory, SoftDeletes;

    protected $factory = ProdutosFactory::class;
    protected $fillable = ['nome', 'preco', 'foto'];

    // Relacionamento com Pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'codigo_produto', 'id');
    }
}
