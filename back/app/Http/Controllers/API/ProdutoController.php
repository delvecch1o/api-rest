<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProdutoService;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    private ProdutoService $produtoService;
  
    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }
    
    public function cadastrarProduto(ProdutoRequest $request, Produto $produto)
    {
        $data = $this->produtoService->createProduto(
            $produto,
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

   
    public function show(Produto $produto)
    {
        $show = $this->produtoService->showService($produto);
        return response()->json([
            'show' => $show
        ]);
    }

    
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $data = $this->produtoService->updateService(
            $produto,
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
            'message' => 'Produto Atualizado com Sucesso!'
        ]);


    }

    
    public function destroy(Produto $produto)
    {
        $this->produtoService->destroyService($produto);
        return response()->json([
            'message' => 'Produto excluido com Sucesso'
        ]);
        
    }
}
