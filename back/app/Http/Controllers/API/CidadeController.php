<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CidadeService;
use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;
use App\Models\Grupo;


class CidadeController extends Controller
{
   private CidadeService $cidadeService;
  
   public function __construct(CidadeService $cidadeService)
   {
       $this->cidadeService = $cidadeService;
   }

    
    public function store(CidadeRequest $request, Cidade $cidade)
    {
        $data = $this->cidadeService->createService(
            $cidade,
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
            'message' => 'Cidade Cadastrada com Sucesso!'
        ]);

    }

    
    public function show(Cidade $cidade)
    {
       $show = $this->cidadeService->showService($cidade);
       
       return response()->json([
           'show' => $show
       ]);
    }

   
    public function update(CidadeRequest $request, Cidade $cidade)
    {
        $data = $this->cidadeService->updateService(
            $cidade,
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
            'message' => 'Cidade Atualizada com Sucesso!'
        ]);
       
    }

    
    public function destroy(Cidade $cidade)
    {
       $this->cidadeService->destroyService($cidade);
       return response()->json([
           'message' => "Cidade excluida com sucesso"
       ]);
    }

    public function vincularGrupo(Cidade $cidade, Grupo $grupo)
    {
        $this->cidadeService->vincularService($cidade, $grupo);

        return response()->json([
            'message' => 'Cidade associada a um grupo com Sucesso'
        ]);
    }

    public function desvincularGrupo(Cidade $cidade)
    {
        $this->cidadeService->desvincularService($cidade);
        return response()->json([
            'message' => 'Cidade dessassociada com sucesso'
        ]);
    }
}
