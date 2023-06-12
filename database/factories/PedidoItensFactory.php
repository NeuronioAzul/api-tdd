<?php

namespace Database\Factories;

use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoItens>
 */
class PedidoItensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pedido_id' => function () {
                return Pedidos::all()->random()->id;
            },
            'produto_id' => function () {
                return Produtos::all()->random()->id;
            },
            'quantidade' => $this->faker->numberBetween(1, 10),
        ];
    }
}
