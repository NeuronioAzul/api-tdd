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
        'Banana com Canela',
        'Maçã com Canela',
        'Queijo com Goiabada',
        'Brigadeiro',
        'Prestígio (Chocolate com Coco)',
        'Nutella',
        'Doce de Leite',
        'Romeu e Julieta (Goiabada com Queijo)',
        'Morango com Chocolate',
        'Abacaxi com Coco',
        'Leite Condensado com Coco',
        'Coco com Leite Condensado',
        'Banana com Chocolate',
        'Banana com Doce de Leite',
        'Banana com Leite Condensado',
        'Morango com Leite Condensado',
        'Goiaba com Queijo',
        'Chocolate com Amendoim',
        'Abóbora com Coco',
        'Creme de Avelã',
        'Amendoim com Doce de Leite',
        'Chocolate com Amendoim e Doce de Leite',
        'Chocolate com Morango',
        'Chocolate com Banana',
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
        'Frango com Milho e Catupiry',
        'Carne com Queijo e Bacon',
        'Queijo com Tomate e Manjericão',
        'Queijo com Presunto e Oregano',
        'Calabresa com Catupiry e Cebola',
        'Carne com Palmito e Catupiry',
        'Camarão com Catupiry e Alho Poró',
        'Queijo com Espinafre e Tomate Seco',
        'Frango com Requeijão e Milho',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Caramelizada',
        'Carne com Cheddar e Bacon',
        'Frango com Cream Cheese e Tomate Seco',
        'Camarão com Queijo e Manjericão',
        'Bacalhau com Cebola e Azeitona',
        'Queijo com Brócolis e Tomate',
        'Carne com Pimentão e Cebola',
        'Frango com Catupiry e Bacon',
        'Camarão com Abacaxi e Queijo',
        'Queijo com Calabresa e Cebola',
        'Carne Seca com Mandioca e Queijo Coalho',
        'Queijo com Presunto e Champignon',
        'Frango com Creme de Milho e Catupiry',
        'Carne com Queijo e Champignon',
        'Queijo com Tomate Seco e Rúcula',
        'Calabresa com Requeijão e Cebola',
        'Frango com Milho e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho',
        'Frango com Bacon e Cebola',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Tomate',
        'Calabresa com Cheddar e Cebola',
        'Carne com Pimentão e Queijo',
        'Frango com Requeijão e Bacon',
        'Camarão com Queijo e Manjericão',
        'Bacalhau com Cebola e Azeitona',
        'Queijo com Brócolis e Tomate Seco',
        'Carne com Calabresa e Cebola',
        'Frango com Cheddar e Bacon',
        'Camarão com Cream Cheese e Tomate Seco',
        'Queijo com Alho Poró e Bacon',
        'Carne Seca com Mandioca e Queijo Coalho',
        'Queijo com Presunto e Champignon',
        'Frango com Creme de Milho e Catupiry',
        'Carne com Queijo e Champignon',
        'Queijo com Tomate Seco e Rúcula',
        'Calabresa com Requeijão e Cebola',
        'Frango com Milho e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho',
        'Frango com Bacon e Cebola',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Tomate',
        'Calabresa com Cheddar e Cebola',
        'Carne com Pimentão e Queijo',
        'Frango com Requeijão e Bacon',
        'Camarão com Queijo e Manjericão',
        'Bacalhau com Cebola e Azeitona',
        'Queijo com Brócolis e Tomate Seco',
        'Carne com Calabresa e Cebola',
        'Frango com Cheddar e Bacon',
        'Camarão com Cream Cheese e Tomate Seco',
        'Queijo com Alho Poró e Bacon',
        'Carne Seca com Mandioca e Queijo Coalho',
        'Queijo com Presunto e Champignon',
        'Frango com Creme de Milho e Catupiry',
        'Carne com Queijo e Champignon',
        'Queijo com Tomate Seco e Rúcula',
        'Calabresa com Requeijão e Cebola',
        'Frango com Milho e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho',
        'Frango com Bacon e Cebola',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Tomate',
        'Calabresa com Cheddar e Cebola',
        'Carne com Pimentão e Queijo',
        'Frango com Requeijão e Bacon',
        'Camarão com Queijo e Manjericão',
        'Bacalhau com Cebola e Azeitona',
        'Queijo com Brócolis e Tomate Seco',
        'Carne com Calabresa e Cebola',
        'Frango com Cheddar e Bacon',
        'Camarão com Cream Cheese e Tomate Seco',
        'Queijo com Alho Poró e Bacon',
        'Carne Seca com Mandioca e Queijo Coalho',
        'Queijo com Presunto e Champignon',
        'Frango com Creme de Milho e Catupiry',
        'Carne com Queijo e Champignon',
        'Queijo com Tomate Seco e Rúcula',
        'Calabresa com Requeijão e Cebola',
        'Frango com Milho e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho',
        'Frango com Bacon e Cebola',
        'Carne Seca com Queijo Coalho e Abóbora',
        'Frango com Catupiry e Milho Verde',
        'Queijo com Tomate e Manjericão Fresco',
        'Calabresa com Cream Cheese e Cebola Roxa',
        'Frango com Requeijão e Ervilha',
        'Carne com Palmito e Azeitona',
        'Camarão com Catupiry e Tomate Seco',
        'Queijo com Espinafre e Ricota',
        'Frango com Milho Verde e Catupiry',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Caramelizada e Bacon',
        'Carne com Cheddar e Cebola Roxa',
        'Frango com Cream Cheese e Azeitona',
        'Camarão com Queijo e Manjericão Fresco',
        'Bacalhau com Cebola Roxa e Azeitona',
        'Queijo com Brócolis e Bacon',
        'Carne com Pimentão e Cebola Roxa',
        'Frango com Requeijão e Milho Verde',
        'Camarão com Queijo e Tomate Seco',
        'Queijo com Alho Poró e Tomate',
        'Frango com Bacon e Cebola Caramelizada',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Roxa e Manjericão Fresco',
        'Calabresa com Cream Cheese e Tomate Seco',
        'Frango com Milho Verde e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho Poró',
        'Frango com Bacon e Cebola Roxa',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Tomate Seco',
        'Calabresa com Cheddar e Cebola Caramelizada',
        'Carne com Pimentão e Queijo Coalho',
        'Frango com Requeijão e Bacon',
        'Camarão com Queijo e Manjericão Fresco',
        'Bacalhau com Cebola Roxa e Azeitona',
        'Queijo com Brócolis e Bacon',
        'Carne com Calabresa e Cebola Caramelizada',
        'Frango com Cheddar e Bacon',
        'Camarão com Cream Cheese e Tomate Seco',
        'Queijo com Alho Poró e Bacon',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Roxa e Manjericão Fresco',
        'Frango com Cream Cheese e Azeitona',
        'Camarão com Queijo e Tomate Seco',
        'Bacalhau com Cebola Roxa e Azeitona',
        'Queijo com Brócolis e Bacon',
        'Carne com Pimentão e Cebola Roxa',
        'Frango com Requeijão e Milho Verde',
        'Camarão com Queijo e Manjericão Fresco',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Tomate Seco',
        'Calabresa com Cheddar e Cebola Caramelizada',
        'Frango com Bacon e Cebola Roxa',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho Poró',
        'Frango com Requeijão e Bacon',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Roxa e Manjericão Fresco',
        'Calabresa com Cream Cheese e Tomate Seco',
        'Frango com Milho Verde e Queijo',
        'Carne com Pimentão e Queijo Coalho',
        'Camarão com Queijo e Tomate Seco',
        'Queijo com Alho Poró e Tomate',
        'Frango com Bacon e Cebola Caramelizada',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Manjericão Fresco',
        'Calabresa com Cream Cheese e Tomate Seco',
        'Frango com Milho Verde e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho Poró',
        'Frango com Requeijão e Bacon',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Roxa e Tomate Seco',
        'Calabresa com Cheddar e Cebola Caramelizada',
        'Frango com Bacon e Cebola Roxa',
        'Camarão com Queijo e Manjericão Fresco',
        'Carne com Pimentão e Queijo Coalho',
        'Queijo com Alho Poró e Tomate',
        'Frango com Requeijão e Milho Verde',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Manjericão Fresco',
        'Calabresa com Cream Cheese e Tomate Seco',
        'Frango com Milho Verde e Queijo',
        'Carne com Palmito e Cheddar',
        'Camarão com Catupiry e Champignon',
        'Queijo com Espinafre e Alho Poró',
        'Frango com Bacon e Cebola Caramelizada',
        'Carne Seca com Abóbora e Queijo Coalho',
        'Queijo com Cebola Roxa e Tomate Seco',
        'Calabresa com Cheddar e Cebola Caramelizada',
        'Frango com Requeijão e Bacon',
        'Camarão com Queijo e Manjericão Fresco',
        'Carne com Pimentão e Queijo Coalho',
        'Queijo com Alho Poró e Tomate',
        'Frango com Milho Verde e Queijo',
        'Carne Seca com Abóbora e Catupiry',
        'Queijo com Cebola Roxa e Manjericão Fresco',
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
