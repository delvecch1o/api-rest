<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function createProduto($nome, $descricao, $preco)
    {
        $produto = Produto::create([
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
            
        ]);
        return [

            'produto' => $produto
        ];
    }
    
}