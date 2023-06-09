<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Http\Resources\PedidosListResource;
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
        $pedidosListResource = PedidosListResource::collection($pedidos);

        return response()->json(
            [
                'data' => $pedidosListResource,
                'pagination' => [
                    'links' =>
                        [
                            'first' => $pedidos->url(1),
                            'last' => $pedidos->url($pedidos->lastPage()),
                            'prev' => $pedidos->previousPageUrl(),
                            'next' => $pedidos->nextPageUrl(),
                        ],
                    'meta' => [
                        'current_page' => $pedidos->currentPage(),
                        'from' => $pedidos->firstItem(),
                        'last_page' => $pedidos->lastPage(),
                        'path' => $pedidos->path(),
                        'per_page' => $pedidos->perPage(),
                        'to' => $pedidos->lastItem(),
                        'total' => $pedidos->total(),
                    ],
                ],
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidosRequest $request): JsonResponse
    {
        return response()->json(
            PedidosResource::make(Pedidos::create($request->all())),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $pedidos): JsonResponse
    {
        return response()->json(
            PedidosResource::make(Pedidos::query()->findOrFail($pedidos)),
            200
        );
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
        return response()->json(
            $produtos,
            200
        );
    }

    public function showCostumers(Pedidos $pedidos)
    {
        $clientes = $pedidos->clientes;
        return response()->json(
            $clientes,
            200
        );
    }
}
