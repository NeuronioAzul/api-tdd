<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Http\Resources\PedidosCollection;
use App\Http\Resources\PedidosResource;
use App\Models\Pedidos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PedidosController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Pedidos::query();
        $pedidos = $query->paginate(5);
        $pedidosListResource = new PedidosCollection($pedidos);

        return response()->json(
            $pedidosListResource
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidosRequest $request): JsonResponse
    {
        $pedido = new Pedidos();
        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->save();

        return response()->json(['message' => 'Pedido criado com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $pedidos): JsonResponse
    {
        return response()->json(
            PedidosResource::make(
                Pedidos::query()->findOrFail($pedidos)
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $pedidos, UpdatePedidosRequest $request)
    {
        Pedidos::query()->find($pedidos)->update($request->all());

        return response()->json(
            PedidosResource::make(
                Pedidos::query()->findOrFail($pedidos)
            ),
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pedidos
     * @return Response
     */
    public function destroy(int $pedidos): Response
    {
        Pedidos::destroy($pedidos);
        return response()->noContent();
    }

    public function showProducts(Pedidos $pedidos)
    {
        $produtos = $pedidos->produtos;
        return response()->json($produtos);
    }

    public function showCostumers(Pedidos $pedidos)
    {
        $clientes = $pedidos->clientes;
        return response()->json($clientes);
    }
}
