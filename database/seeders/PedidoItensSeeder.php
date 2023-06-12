<?php

namespace Database\Seeders;

use App\Models\PedidoItens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoItensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidoItens::factory()
            ->count(300)
            ->create();
    }
}
