<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CampanhaService;
use App\Http\Requests\CampanhaRequest;
use App\Models\Grupo;
use App\Models\Campanha;
use App\Models\Produto;
use App\Http\Requests\VincularRequest;


class CampanhaController extends Controller
{
    private CampanhaService $campanhaService;
  
    public function __construct(CampanhaService $campanhaService)
    {
        $this->campanhaService = $campanhaService;
    }
    
    public function cadastrarCampanha(CampanhaRequest $request, Grupo $grupo)
    {
        $data = $this->campanhaService->createCampanha(
            $grupo,
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
   
    public function show(Campanha $campanha)
    {
       $show = $this->campanhaService->showService($campanha) ;

       return response()->json([
           'show' => $show
       ]);
    }

   
   
    public function update(CampanhaRequest $request, Grupo $grupo)
    {
        $data = $this->campanhaService->updateService(
            $grupo,
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
            'message' => 'Campanha Atualizada  com Sucesso!'

        ]);
    }

    
    public function destroy(Campanha $campanha)
    {
        $this->campanhaService->destroyService($campanha);
        return response()->json([
            'message' => "Campanha excluida com Sucesso"
        ]);
    }



    public function vincularProduto(VincularRequest $request, Campanha $campanha, Produto $produto)
    {
        $this->campanhaService->vincularService(
            $campanha,$produto,
            ...array_values(
                $request->only([
                    'preco',
                ])
            )
        );
        return response()->json([
            'status' => 200,
            'produto-vinculado' => $campanha,
            'preco-original' => $produto['preco']
            
        ]);
        
    }

    public function desvincularProduto(Campanha $campanha, Produto $produto)
    {
       $this->campanhaService->desvincularService($campanha,$produto);
        
       return response()->json([
            'status' => 200,
            'message' => 'Produto desvinculado da campanha com Sucesso !'
            
        ]);
    }
}
