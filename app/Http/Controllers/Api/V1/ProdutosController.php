<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Http\Resources\ProdutosCollection;
use App\Http\Resources\ProdutosResource;
use App\Models\Produtos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $query = Produtos::query();
        $produtos = $query->paginate(5);
        $produtosListResource = new ProdutosCollection($produtos);

        return response()->json(
            $produtosListResource
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProdutosRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProdutosRequest $request): JsonResponse
    {
        $fotoPath = $request->file('foto')->store('public/produtos');
        $req = $request->all();
        $req['foto'] = $fotoPath;

        return response()->json(
            ProdutosResource::make(Produtos::create($req)),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $produtos
     * @return JsonResponse
     */
    public function show(int $produtos): JsonResponse
    {
        return response()->json(
            ProdutosResource::make(Produtos::query()->findOrFail($produtos))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $produtos
     * @param  UpdateProdutosRequest  $request
     * @return Response
     */
    public function update(int $produtos, UpdateProdutosRequest $request): Response
    {
        $req = $request->all();
        $produtos = Produtos::query()->find($produtos);

        if ($produtos && isset($produtos->foto)) {
            Storage::delete($produtos->foto);
        }

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/produtos');
            $req['foto'] = $fotoPath;
        }

        $produtos->update($req);

        return response()->noContent(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $produtos
     * @return Response
     */
    public function destroy(int $produtos): Response
    {
        Produtos::destroy($produtos);
        return response()->noContent();
    }
}
