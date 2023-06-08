<?php

namespace Database\Factories;

use App\Models\Produtos;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
//        $pastel = $this->faker->unique(false, 10000)->pastelName();
//        return [
//            'nome' => $pastel,
//            'preco' => $this->faker->randomFloat(2, 3, 10),
//            'foto' => $this->faker->imageUrl(600, 450, null, false, $pastel, true, 'png')
//        ];
//
        $produtos_path = storage_path('app/public/produtos');

        if (!File::exists($produtos_path)) {
            File::makeDirectory($produtos_path);
        }

        $pastel = $this->faker->unique(false, 10000)->pastelName();

        $image = $this->faker->image($produtos_path, 600, 450, null, false, true, $pastel, false );

        return [
            'nome' => $pastel,
            'preco' => $this->faker->randomFloat(2, 3, 10),
            'foto' => $image
        ];
    }



}
