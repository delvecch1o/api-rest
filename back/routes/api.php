<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CidadeController;
use App\Http\Controllers\API\CampanhaController;
use App\Http\Controllers\API\ProdutoController;
use App\Http\Controllers\API\GrupoController;




Route::post('/cidade', [CidadeController::class, 'cadastrarCidade']);
Route::post('/grupo/{grupo}/campanha', [CampanhaController::class, 'cadastrarCampanha']);

Route::post('/campanha/{campanha}/vincular-produto/{produto}', [CampanhaController::class, 'vincularProduto']);

Route::post('/campanha/{campanha}/desvincular-produto/{produto}', [CampanhaController::class, 'desvincularProduto']);

Route::post('/produto', [ProdutoController::class, 'cadastrarProduto']);
Route::post('/grupo', [GrupoController::class, 'cadastrarGrupo']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
