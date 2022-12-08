<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CampanhaService;
use App\Http\Requests\CampanhaRequest;
use App\Models\Grupo;
use App\Models\Campanha;
use App\Models\Produto;
use Illuminate\Http\Request;


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
    public function vincularProduto(Request $request, Campanha $campanha, Produto $produto)
    {
        $campanha->produtos()->attach($produto->id,['preco' => $request->input('preco')]);
        return response()->json([
            'status' => 200,
            
        ]);
    }

    public function desvincularProduto(Request $request, Campanha $campanha, Produto $produto)
    {
        $campanha->produtos()->detach($produto->id);
        return response()->json([
            'status' => 200,
            
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
