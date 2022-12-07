<?php

namespace App\Services;

use App\Models\Campanha;

class CampanhaService
{
    public function createCampanha($nome, $descricao)
    {
        $campanha = Campanha::create([
            'nome' => $nome,
            'descricao' => $descricao,
            
        ]);
        return [

            'campanha' => $campanha
        ];
    }
    
}