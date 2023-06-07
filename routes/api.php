<?php

use App\Http\Controllers\Api\V1\ClientesController;
use App\Http\Controllers\Api\V1\PedidosController;
use App\Http\Controllers\Api\V1\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'v1'], function () {

    //laravel named routes for CRUDL Controller ClienteResource
    Route::get('clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');
    Route::post('clientes', [ClientesController::class, 'store'])->name('clientes.store');
    Route::put('clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

    //laravel named routes for CRUDL Controller ProdutosResource
    Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos.index');
    Route::get('produtos/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
    Route::post('produtos', [ProdutosController::class, 'store'])->name('produtos.store');
    Route::put('produtos/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
    Route::delete('produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');

    //laravel named routes for CRUDL Controller PedidosResource
    Route::get('pedidos', [PedidosController::class, 'index'])->name('pedidos.index');
    Route::get('pedidos/{id}', [PedidosController::class, 'show'])->name('pedidos.show');
    Route::post('pedidos', [PedidosController::class, 'store'])->name('pedidos.store');
    Route::put('pedidos/{id}', [PedidosController::class, 'update'])->name('pedidos.update');
    Route::delete('pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');
});
