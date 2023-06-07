<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use App\Models\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
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
