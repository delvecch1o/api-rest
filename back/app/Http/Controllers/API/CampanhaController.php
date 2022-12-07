<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CampanhaService;
use App\Http\Requests\CampanhaRequest;


class CampanhaController extends Controller
{
    private CampanhaService $campanhaService;
  
    public function __construct(CampanhaService $campanhaService)
    {
        $this->campanhaService = $campanhaService;
    }
    
    public function cadastrarCampanha(CampanhaRequest $request)
    {
        $data = $this->campanhaService->createCampanha(
            ...array_values(
                $request->only([
                    'nome',
                    'descricao',
                    
                ])
            )
        );
            return response()->json([
                'status' => 200,
                'campanha' => $data['campanha'],
                'message' => 'Campanha cadastrada com Sucesso!'
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
