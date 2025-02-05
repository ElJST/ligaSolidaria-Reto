<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Centro;

class FiltroController extends Controller
{
    // Obtener todos los torneos
    public function getTorneos()
    {
        $torneos = Torneo::all();
        return response()->json($torneos);
    }

    // Obtener centros según el torneo seleccionado
    public function getCentros($torneoId)
    {
        $centros = Centro::whereHas('retos', function ($query) use ($torneoId) {
            $query->where('fk_torneo', $torneoId);
        })->get();

        return response()->json($centros);
    }
}
