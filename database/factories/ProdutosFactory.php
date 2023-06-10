<?php

namespace Database\Factories;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

//use Illuminate\Http\File;

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
        $produtos_path = storage_path('app/public/produtos');

        $pastel = $this->faker->unique(false, 1000)->pastelName();


//        $image = $this->faker->image($produtos_path, 50, 35);

        $image = $this->faker->imageUrl(600, 450, null, false, $pastel, false, 'png');

        return [
            'nome' => $pastel,
            'preco' => $this->faker->randomFloat(2, 3, 10),
            'foto' => 'public/produtos/'.$image
        ];
    }
}
