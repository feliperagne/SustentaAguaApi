<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estado = Estado::select('id', 'nome')->get();

        return [
            "status" => true,
            'data' => $estado
        ];
    }

    public function listarPopulacaoEConsumo($id)
    {
        $estado = Estado::find($id);
    
        if (!$estado) {
            return [
                'status' => false,
                'message' => 'Estado não encontrado.',
            ];
        }
    
        return [
            'status' => true,
            'data' => [
                'populacao' => $estado->num_habitante, 
                'consumoMedio' => $estado->consumo_medio, 
            ],
        ];
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado)
    {
        return [
            "status" => true,
            "data" => $estado
        ];
    }

}
