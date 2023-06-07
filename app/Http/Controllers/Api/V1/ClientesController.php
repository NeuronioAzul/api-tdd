<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Http\Resources\ClientesListResource;
use App\Http\Resources\ClientesResource;
use App\Models\Clientes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $query = Clientes::query();
        $clientes = $query->paginate(5);
        $clientesListResource = ClientesListResource::collection($clientes);

        return response()->json(
            [
                'data' => $clientesListResource,
                'pagination' => [
                    'links' =>
                        [
                            'first' => $clientes->url(1),
                            'last' => $clientes->url($clientes->lastPage()),
                            'prev' => $clientes->previousPageUrl(),
                            'next' => $clientes->nextPageUrl(),
                        ],
                    'meta' => [
                        'current_page' => $clientes->currentPage(),
                        'from' => $clientes->firstItem(),
                        'last_page' => $clientes->lastPage(),
                        'path' => $clientes->path(),
                        'per_page' => $clientes->perPage(),
                        'to' => $clientes->lastItem(),
                        'total' => $clientes->total(),
                    ],
                ],
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientesRequest $request): JsonResponse
    {
        return response()->json(
            ClientesResource::make(Clientes::create($request->all())),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clientes): JsonResponse
    {
        return response()->json(
            ClientesResource::make(Clientes::query()->findOrFail($clientes)),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientesRequest $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(int $clientes)
    {
        Clientes::destroy($clientes);
        return response()->noContent();
    }
}
