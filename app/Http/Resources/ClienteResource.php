<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    use HasLinks;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'data_nascimento' => $this->data_nascimento,
            'endereco' => $this->endereco,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'data_cadastro' => $this->data_cadastro,
            '_links' => $this->links(),
        ];
    }
}
