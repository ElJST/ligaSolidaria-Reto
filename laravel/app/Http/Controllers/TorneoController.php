<?php
 
namespace App\Http\Controllers;
 
use App\Models\Torneo;
use App\Models\Centro;
use Illuminate\Http\Request;
use App\Models\Partido;
 
class TorneoController extends Controller
{
    /**
     * Muestra todos los torneos
     */
    public function index(Request $request)
    {
        // Obtener todos los torneos y cargar su localización y el último partido
        $torneos = Torneo::with(['localizacion', 'partidos' => function ($query) {
            $query->orderBy('fecha_partido', 'desc');
        }])->get();
 
        // Verificar si se seleccionó un torneo específico
        $torneoSeleccionado = null;
        $ultimoPartido = null;
 
        //si se ha seleccionado un torneo, se obtiene el torneo y el último partido
        if ($request->has('torneo-id') && $request->input('torneo-id')) {
            if ($request->has('torneo-id') && $request->input('torneo-id')) {
                $torneoSeleccionado = Torneo::with('localizacion', 'partidos')
                    ->where('id_torneo', $request->input('torneo-id'))
                    ->first();
 
                // ultimo partido del torneo seleccionado
                $ultimoPartido = Partido::where('fk_torneo', $torneoSeleccionado->id_torneo)
                    ->orderBy('fecha_partido', 'desc')
                    ->first();
            }
        }
 
        return view('torneos.index', compact('torneos', 'torneoSeleccionado', 'ultimoPartido'));
    }
 
    public function mostrarTorneo($id)
    {
        $torneo = Torneo::with(['localizacion', 'partidos.equipoLocal.multimedia', 'partidos.equipoVisitante.multimedia'])->find($id);
 
        if (!$torneo) {
            return response()->json(['error' => 'Torneo no encontrado'], 404);
        }
 
        return view('torneos.detalle', compact('torneo'));
    }
 
 
 
    public function centros($id_torneo)
    {
        // Obtener el torneo seleccionado
        $torneo = Torneo::findOrFail($id_torneo);
 
        // Obtener los centros con sus equipos y logos asociados
        $centros = Centro::with(['equipos', 'logo'])
            ->select('centros.*')
            ->join('equipos', 'centros.id_centro', '=', 'equipos.fk_centro')
            ->join('partidos', function ($join) {
                $join->on('equipos.id_equipo', '=', 'partidos.eq_local')
                    ->orOn('equipos.id_equipo', '=', 'partidos.eq_visitante');
            })
            ->join('torneos', 'torneos.id_torneo', '=', 'partidos.fk_torneo')
            ->where('torneos.id_torneo', $id_torneo)
            ->distinct()
            ->get();
 
        return view('centros.index', compact('centros', 'torneo'));
    }
 
 
 
 
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('torneos.create');
    }
 
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}