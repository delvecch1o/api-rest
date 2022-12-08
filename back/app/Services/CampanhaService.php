<?php

namespace App\Services;

use App\Models\Campanha;
use App\Models\Grupo;

class CampanhaService
{
    public function createCampanha(Grupo $grupo, $nome, $descricao)
    {
        $campanha = $grupo->campanhas()->create([
            'nome' => $nome,
            'descricao' => $descricao,
            
        ]);
        return [

            'campanha' => $campanha
        ];
    }
    
}