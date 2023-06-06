<?php

namespace App\Faker;

use Faker\Provider\Base;

class PastelNameProvider extends Base
{
    protected static $flavors = [
        'Queijo',
        'Presunto e Queijo',
        'Carne',
        'Frango',
        'Calabresa',
        'Pizza',
        'Palmito',
        'Camarão',
        'Camarão com Catupiry',
        'Bacalhau',
        'Camarão com Queijo',
        'Carne Seca',
        'Queijo com Tomate',
        'Queijo com Bacon',
        'Queijo com Presunto',
        'Queijo com Calabresa',
        'Carne com Queijo',
        'Frango com Catupiry',
        'Frango com Milho',
        'Frango com Requeijão',
        'Frango com Creme de Milho',
        'Frango com Cheddar',
        'Frango com Bacon',
        'Frango com Palmito',
        'Frango com Quiabo',
        'Frango com Queijo e Presunto',
        'Frango com Tomate Seco',
        'Frango com Gorgonzola',
        'Frango com Pimenta',
        'Carne com Palmito',
        'Camarão com Palmito',
        'Camarão com Requeijão',
        'Camarão com Catupiry e Bacon',
        'Camarão com Queijo e Presunto',
        'Camarão com Queijo e Tomate',
        'Camarão com Cream Cheese',
        'Camarão com Alho Poró',
        'Camarão com Cheddar e Milho',
        'Camarão com Pimenta e Cebola',
        'Camarão com Abacaxi',
        'Bacalhau com Queijo',
        'Bacalhau com Cebola',
        'Bacalhau com Batata',
        'Bacalhau com Cream Cheese e Azeitona',
        'Bacalhau com Espinafre',
        'Bacalhau com Tomate Seco',
        'Carne Seca com Queijo',
        'Carne Seca com Mandioca',
        'Carne Seca com Abóbora',
        'Carne Seca com Requeijão',
        'Carne Seca com Catupiry',
        'Carne Seca com Banana da Terra',
        'Carne Seca com Cebola Roxa',
        'Carne Seca com Pimenta Biquinho',
        'Carne Seca com Queijo Coalho',
        'Carne Seca com Tomate Seco e Rúcula',
        'Carne Seca com Gorgonzola',
    ];

    /**
     * Returns the flavor/name of Pastel
     *
     * @return string
     */
    public function pastelName(): string
    {
        return static::randomElement(static::$flavors);
    }
}
