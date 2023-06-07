<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidosRequest $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}
