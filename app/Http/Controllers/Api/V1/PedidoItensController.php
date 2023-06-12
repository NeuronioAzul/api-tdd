<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoItensRequest;
use App\Http\Requests\UpdatePedidoItensRequest;
use App\Models\PedidoItens;
use App\Http\Resources\PedidoItensCollection;
use App\Http\Resources\PedidoItensResource;
use App\Http\Resources\PedidosResource;

class PedidoItensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = PedidoItens::query();
        $pedidoItens = $query->paginate(5);
        $pedidoItensListResource = new PedidoItensCollection($pedidoItens);

        return response()->json(
            $pedidoItensListResource
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoItensRequest $request)
    {
        return response()->json(
            PedidoItensResource::make(PedidoItens::create($request->all())),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PedidoItens $pedidoItens)
    {
        return response()->json(
            PedidoItensResource::make(PedidoItens::query()->findOrFail($pedidoItens))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoItensRequest $request, PedidoItens $pedidoItens)
    {
        $pedidoItens->update($request->all());

        return response()->json(
            PedidoItensResource::make($pedidoItens)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoItens $pedidoItens)
    {
        //
    }
}
