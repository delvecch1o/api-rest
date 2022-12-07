<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProdutoService;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    private ProdutoService $produtoService;
  
    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }
    
    public function cadastrarProduto(ProdutoRequest $request)
    {
        $data = $this->produtoService->createProduto(
            ...array_values(
                $request->only([
                    'nome',
                    'descricao',
                    'preco',
                    
                ])
            )
        );
            return response()->json([
                'status' => 200,
                'produto' => $data['produto'],
                'message' => 'Produto cadastrada com Sucesso!'
            ]);
       
    }

   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
       
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
