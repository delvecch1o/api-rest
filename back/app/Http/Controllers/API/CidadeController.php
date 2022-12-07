<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CidadeService;
use App\Http\Requests\CidadeRequest;


class CidadeController extends Controller
{
   private CidadeService $cidadeService;
  
   public function __construct(CidadeService $cidadeService)
   {
       $this->cidadeService = $cidadeService;
   }

    
    public function cadastrarCidade(CidadeRequest $request)
    {
        $data = $this->cidadeService->createCidade(
            ...array_values(
                $request->only([
                    'municipio',
                    'estado',
                    'pais',
                ])
            )
        );
            return response()->json([
                'status' => 200,
                'cidade' => $data['cidade'],
                'message' => 'Cidade cadastrada com Sucesso!'
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
