<?php

namespace App\Services;

use App\Models\Cidade;

class CidadeService
{
    public function createCidade($municipio, $estado, $pais)
    {
        $cidade = Cidade::create([
            'municipio' => $municipio,
            'estado' => $estado,
            'pais' => $pais
        ]);
        return [

            'cidade' => $cidade
        ];
    }
    
}