<?php

namespace App\Services;

use App\Models\Campanha;
use App\Models\Grupo;
use App\Models\Produto;

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

    public function showService(Campanha $campanha)
    {
        $show = $campanha->all();
        return [
            'show' => $show
        ];
    }

    public function updateService(Grupo $grupo, $nome, $descricao)
    {
        $campanha = $grupo->campanhas()->update([
            'nome' => $nome,
            'descricao' => $descricao,
        ]);
        return [
            'campanha' => $campanha
        ];
    }

    public function destroyService(Campanha $campanha)
    {
        $campanha->delete();
    }

   
    public function vincularService(Campanha $campanha, Produto $produto, $preco)
    {
        $campanha->produtos()->attach($produto->id,['preco' => $preco ]);
        return [
            'campanha' => $campanha
        ];
    }

    public function desvincularService(Campanha $campanha, Produto $produto)
    {
        $campanha->produtos()->detach($produto->id);
        return [
            'campanha' => $campanha
        ];
    }


    
}