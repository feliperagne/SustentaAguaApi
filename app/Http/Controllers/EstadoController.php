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
