<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\GrupoService;
use App\Http\Requests\GrupoRequest;

class GrupoController extends Controller
{
    private GrupoService $grupoService;

    public function __construct(GrupoService $grupoService)
    {
        $this->grupoService = $grupoService;
    }
   
    
    public function cadastrarGrupo(GrupoRequest $request)
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

   
    public function show($id)
    {
       
    }

    
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
       
    }
}
