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
        $pastel = $this->faker->unique(false, 1000)->pastelName();
        return [
            'nome' => $pastel,
            'preco' => $this->faker->randomFloat(2, 3, 10),
            'foto' => $this->faker->imageUrl(600, 450, null, false, $pastel, true, 'png')
        ];
    }
}
