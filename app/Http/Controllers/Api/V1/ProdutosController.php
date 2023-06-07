<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Models\Produtos;

class ProdutosController extends Controller
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
    public function store(StoreProdutosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutosRequest $request, Produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
