<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Database\Factories\ClientesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clientes::factory()
            ->count(100)
            ->create();
    }
}
