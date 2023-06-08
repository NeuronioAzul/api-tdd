<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Resources\ProdutosListResource;
use App\Http\Resources\ProdutosResource;
use App\Models\Produtos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
        $produtosListResource = ProdutosListResource::collection($produtos);

        return response()->json(
            [
                'data' => $produtosListResource,
                'pagination' => [
                    'links' =>
                        [
                            'first' => $produtos->url(1),
                            'last' => $produtos->url($produtos->lastPage()),
                            'prev' => $produtos->previousPageUrl(),
                            'next' => $produtos->nextPageUrl(),
                        ],
                    'meta' => [
                        'current_page' => $produtos->currentPage(),
                        'from' => $produtos->firstItem(),
                        'last_page' => $produtos->lastPage(),
                        'path' => $produtos->path(),
                        'per_page' => $produtos->perPage(),
                        'to' => $produtos->lastItem(),
                        'total' => $produtos->total(),
                    ],
                ],
            ],
            200
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
        $fotoPath = $request->file('foto')->store('produtos');
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
            ProdutosResource::make(Produtos::query()->findOrFail($produtos)),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $produtos
     * @param  StoreProdutosRequest  $request
     * @return Response
     */
    public function update(int $produtos, StoreProdutosRequest $request): Response
    {
        $req = $request->all();

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produtos');
            $req['foto'] = $fotoPath;
        }

        $produtos = Produtos::query()->find($produtos);
        $produtos->update($req);

        return response()->setStatusCode(201);
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
