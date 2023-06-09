<?php

namespace App\Hateoas;

use App\Models\Pedidos;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class PedidosHateoas
{
    use CreatesLinks;

    public function self(Pedidos $pedidos): ?Link
    {
        return $this->link('pedidos.show', ['id' => $pedidos->id]);
    }

    public function index(): ?Link
    {
        return $this->link('pedidos.index');
    }

    public function store(): ?Link
    {
        return $this->link('pedidos.store');
    }

    public function update(Pedidos $pedidos): ?Link
    {
        return $this->link('pedidos.update', ['id' => $pedidos->id]);
    }

    public function destroy(Pedidos $pedidos): ?Link
    {
        return $this->link('pedidos.destroy', ['id' => $pedidos->id]);
    }

    public function clientes(Pedidos $pedido): ?Link
    {
        return $this->link('pedidos.showCostumers', ['pedidos' => $pedido->id]);
    }

    public function itensDosPedidos(Pedidos $pedido): array
    {
        $itensDosPedidoa = $pedido->itensDosPedidos;

        $links = [];

        foreach ($itensDosPedidoa as $item) {
            $links[] = $this->link('itens_dos_pedidos.show', ['id' => $item->produto_id]);
        }

        return $links;
    }

    public function cresteLinksPedidos()
    {
        $this->self();
        $this->index();
        $this->store();
        $this->update();
        $this->destroy();
        $this->clientes();
        $this->itensDosPedidos();
    }

}
