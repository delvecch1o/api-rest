<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function createProduto(Produto $produto, $nome, $descricao, $preco)
    {
        $produto->create([
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
            
        ]);
        return [

            'produto' => $produto
        ];
    }

    public function showService(Produto $produto)
    {
        $show = $produto->all();
        return [
            'show' => $show
        ];
    }

    public function updateService(Produto $produto, $nome, $descricao, $preco)
    {
        $produto->update([
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
            
        ]);
        return [

            'produto' => $produto
        ];

    }

    public function destroyService(Produto $produto)
    {
        $produto->delete();
    }
    
}