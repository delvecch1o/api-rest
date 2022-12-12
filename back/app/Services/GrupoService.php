<?php

namespace App\Services;

use App\Models\Grupo;
use App\Models\Campanha;

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

    public function vincularService(Grupo $grupo, Campanha $campanha)
    {
        $grupo->campanha_ativa()->associate($campanha);
        $grupo->save();
        return [
            'grupo' => $grupo
        ];
    }

    public function desvincularService(Grupo $grupo)
    {
        $grupo->campanha_ativa()->dissociate();
        $grupo->save();
        return [
            'grupo' => $grupo
        ];
    }
    
}