<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CidadeController;
use App\Http\Controllers\API\CampanhaController;
use App\Http\Controllers\API\ProdutoController;
use App\Http\Controllers\API\GrupoController;




Route::post('/cidade', [CidadeController::class, 'store']);
Route::get('/cidade/show', [CidadeController::class, 'show']);
Route::put('/cidade/update/{cidade}', [CidadeController::class, 'update']);
Route::delete('/cidade/{cidade}', [CidadeController::class, 'destroy']);

Route::post('/grupo', [GrupoController::class, 'store']);
Route::get('/grupo/show', [GrupoController::class, 'show']);
Route::put('/grupo/update/{grupo}', [GrupoController::class, 'update']);
Route::delete('/grupo/{grupo}', [GrupoController::class, 'destroy']);


Route::post('/grupo/{grupo}/campanha', [CampanhaController::class, 'cadastrarCampanha']);
Route::get('/campanha/show', [CampanhaController::class, 'show']);
Route::put('/grupo/{grupo}/campanha/{campanha}', [CampanhaController::class, 'update']);
Route::delete('/campanha/{campanha}', [CampanhaController::class, 'destroy']);

Route::post('/campanha/{campanha}/vincular-produto/{produto}', [CampanhaController::class, 'vincularProduto']);

Route::post('/campanha/{campanha}/desvincular-produto/{produto}', [CampanhaController::class, 'desvincularProduto']);

Route::post('/produto', [ProdutoController::class, 'cadastrarProduto']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
