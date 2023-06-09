<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientesResource extends JsonResource
{
    use HasLinks;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'data_de_nascimento' => $this->data_de_nascimento,
            'endereco' => $this->endereco,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'data_de_cadastro' => $this->data_de_cadastro,
            '_links' => $this->links(),
        ];
    }
}
