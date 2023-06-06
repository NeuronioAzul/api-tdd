<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'data_nascimento' => $this->faker->date(),
            'endereco' => $this->faker->address,
            'complemento' => $this->faker->optional()->secondaryAddress,
            'bairro' => $this->faker->citySuffix,
            'cep' => $this->faker->postcode,
            'data_cadastro' => now(),
        ];
    }
}
