<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Http\Resources\ClientesCollection;
use App\Http\Resources\ClientesListResource;
use App\Models\Clientes;
use App\Http\Resources\ClienteResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            ClientesListResource::collection(Clientes::paginate(5)),
            200
        );
//        $clientes = Clientes::query()->paginate(5);
//        $clientesCollection = ClienteResource::collection($clientes);
//        return response()->json(
//            $clientesCollection,
//            200
//        );

//        return response()->json([
//            ['id' => 1],
//            ['id' => 2],
//            ['id' => 3]
//        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientesRequest $request)
    {
        return response()
            ->json(Clientes::add($request), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clientes): JsonResponse
    {

        return response()->json(
            ClienteResource::make(Clientes::query()->findOrFail($clientes)),
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
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
