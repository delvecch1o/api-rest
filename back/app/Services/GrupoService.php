<?php

namespace App\Services;

use App\Models\Grupo;

class GrupoService
{
    public function createGrupo($nome)
    {
        $grupo = Grupo::create([
            'nome' => $nome
            
        ]);
        return [

            'grupo' => $grupo
        ];
    }
    
}