<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\GrupoService;
use App\Http\Requests\GrupoRequest;
use App\Models\Grupo;
use App\Models\Campanha;

class GrupoController extends Controller
{
    private GrupoService $grupoService;

    public function __construct(GrupoService $grupoService)
    {
        $this->grupoService = $grupoService;
    }
   
    
    public function store(GrupoRequest $request)
    {
        $data = $this->grupoService->createGrupo(
            ...array_values(
                $request->only([
                    'nome',
                ])
            )
        );
            return response()->json([
                'status' => 200,
                'grupo' => $data['grupo'],
                'message' => 'Grupo cadastrado com Sucesso!'
            ]);
        
    }

   
    public function show(Grupo $grupo)
    {
       $show = $this->grupoService->showService($grupo);
       return response()->json([
           'show' => $show
       ]);
    }

    
    public function update(GrupoRequest $request, Grupo $grupo)
    {
        $data = $this->grupoService->updateService(
            $grupo,
            ...array_values(
                $request->only([
                    'nome',
                ])
            )
        );
        return response()->json([
            'status' => 200,
            'grupo' => $data['grupo'],
            'message' => 'Grupo Atualizado com Sucesso'
        ]);
    }

    
    public function destroy(Grupo $grupo)
    {
       $this->grupoService->destroyService($grupo);
       return response()->json([
           'message' => "Grupo excluido com sucesso"
       ]);
    }

    public function vincularCampanha(Grupo $grupo, Campanha $campanha)
    {
       $this->grupoService->vincularService($grupo, $campanha);
       
       return response()->json([
           'message' => 'Campanha associada com sucesso'
       ]);
    }
    
    public function desvincularCampanha(Grupo $grupo)
    {
        $this->grupoService->desvincularService($grupo);
        
        return response()->json([
            'message' => 'Campanha desassociada com sucesso'
        ]);
    }
}
