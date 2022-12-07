<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CidadeController;
use App\Http\Controllers\API\CampanhaController;
use App\Http\Controllers\API\ProdutoController;




Route::post('/cadastrar', [CidadeController::class, 'cadastrarCidade']);
Route::post('/cadastrarCampanha', [CampanhaController::class, 'cadastrarCampanha']);
Route::post('/cadastrarProduto', [ProdutoController::class, 'cadastrarProduto']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
