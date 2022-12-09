<?php

namespace App\Services;

use App\Models\Cidade;

class CidadeService
{
    public function createService(Cidade $cidade, $municipio, $estado, $pais)
    {
        $cidade->create([
            'municipio' => $municipio,
            'estado' => $estado,
            'pais' => $pais
        ]);
        return [
            'cidade' => $cidade
        ];
    }

    public function showService(Cidade $cidade)
    {
        
      $show = $cidade->all();
        return [
            'show' => $show
        ];
    }

    public function updateService(Cidade $cidade, $municipio, $estado, $pais)
    {
          $cidade->update([
            'municipio' => $municipio,
            'estado' => $estado,
            'pais' => $pais
        ]);
        return [

            'cidade' => $cidade
        ];

    }

    public function destroyService(Cidade $cidade)
    {
        $cidade->delete();
    }
    
}