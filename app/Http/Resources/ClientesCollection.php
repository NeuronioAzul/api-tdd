<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientesCollection extends ResourceCollection
{
    use HasLinks;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            // 'links' => [
            //     'first' => $this->url(1),
            //     'last' => $this->url($this->lastPage()),
            //     'prev' => $this->previousPageUrl(),
            //     'next' => $this->nextPageUrl(),
            // ],
            'links' => [
            //     'first' => $this->urlGenerator->to('/clientes?page=1'),
            // //     'last' => $this->urlGenerator->to('/clientes?page=' . $this->lastPage()),
            //     'prev' => $this->previousPageUrl(),
            //     'next' => $this->nextPageUrl(),
            ],
            'meta' => [
                // 'current_page' => $this->currentPage(),
                // 'from' => $this->firstItem(),
                // 'last_page' => $this->lastPage(),
                // 'path' => $this->path(),
                // 'per_page' => $this->perPage(),
                // 'to' => $this->lastItem(),
                // 'total' => $this->total(),
            ],
            '_links' => $this->links()
        ];
    }
}
