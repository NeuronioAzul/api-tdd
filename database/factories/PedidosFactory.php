<?php

namespace Database\Factories;

use App\Models\Clientes;
use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    protected $model = Pedidos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => function () {
                return Clientes::all()->random()->id;
            },
            'produto_id' => function () {
                return Produtos::all()->random()->id;
            },
            'data_criacao' => $this->faker->date(),
        ];
    }
}