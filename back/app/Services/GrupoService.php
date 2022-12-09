<?php

namespace App\Services;

use App\Models\Grupo;

class GrupoService
{
    public function createGrupo(Grupo $grupo,$nome)
    {
        $grupo->create([
            'nome' => $nome           
        ]);
        return [
            'grupo' => $grupo
        ];
    }

    public function showService(Grupo $grupo)
    {
        $show = $grupo->all();
        return [
            'show' => $show
        ];
    }

    public function updateService(Grupo $grupo, $nome)
    {
        $grupo->update([
            'nome' => $nome,
        ]);
        return [
            'grupo' => $grupo
        ];
    }

    public function destroyService(Grupo $grupo)
    {
        $grupo->delete();
    }
    
}