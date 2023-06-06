<?php

namespace Database\Factories;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produtos>
 */
class ProdutosFactory extends Factory
{
    protected $model = Produtos::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique(false, 100)->pastelName(),
            'preco' => $this->faker->randomFloat(2, 3, 10),
            'foto' => $this->faker->imageUrl(300, 250, 'food', true, null, false, 'png')
        ];
    }
}
