<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidosListResource extends JsonResource
{
    use HasLinks;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'codigo_do_cliente' => $this->codigo_do_cliente,
            'codigo_do_produto' => $this->codigo_do_produto,
            'data_criacao' => $this->data_criacao,
            'produto' => $this->produtos,
            'cliente' => $this->clientes,
            '_links' => $this->links()
        ];
    }
}
