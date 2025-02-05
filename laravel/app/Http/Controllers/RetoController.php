<?php

namespace App\Http\Controllers;

use App\Models\Reto;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Torneo;
use App\Models\Multimedia;


class RetoController extends Controller
{
    
    public function indexsololectura(Request $request)
{
    $centros = Centro::all();
    $centroSeleccionado = $request->input('fk_centro');

    $torneos = Torneo::all();
    // Filtrar retos según el centro seleccionado
    $query = Reto::query();
    $retos = Reto::with('multimedia')->get();
    $retos = Reto::when($centroSeleccionado, function ($query) use ($centroSeleccionado) {
        return $query->where('fk_centro', $centroSeleccionado);
    })
    ->with('multimedia') // Relación con multimedia
    ->paginate(6);

    return view('web_solidaria/retos.index', compact('centros', 'retos', 'centroSeleccionado','torneos'));
}


    public function index()
{
    $userCentro = 'Administrador'; // Obtener el valor de la variable de sesión
    $retos = Reto::with('centro', 'torneo')->paginate(3); // Cambiar 'get()' por 'paginate()'
    
    // Modificar cada reto para añadir la propiedad 'can_edit_delete'
    $retos->getCollection()->transform(function ($reto) use ($userCentro) {
        $reto->can_edit_delete = $userCentro == 'Administrador' || ($reto->centro && $reto->centro->nombre == $userCentro);
        return $reto;
    });

    return view('admin/retos.index', compact('retos'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centros = Centro::all();
        $torneos = Torneo::all();
        $userCentro = 'Administrador'; // Obtener la variable de sesión
    
        return view('admin/retos.create', compact('centros', 'torneos', 'userCentro'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'estudios' => 'required',
        'fk_centro' => 'required|exists:centros,id_centro', // Validar que fk_centro sea válido
        'fk_torneo' => 'required|exists:torneos,id_torneo', // Validar que fk_torneo sea válido
    ]);

    // Crear el reto con los datos enviados
    Reto::create($request->all());

    return redirect()->route('retos.index')->with('success', 'Reto añadido exitosamente');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reto = Reto::findOrFail($id);
        dd($reto);
        return view('retos.show', compact('reto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{   
    $userCentro = 'Administrador'; // Obtener la variable de sesión
    $retos = Reto::findOrFail($id);
    $centros = Centro::all();  // Obtener todos los centros disponibles
    $torneos = Torneo::all();  // Obtener todos los torneos disponibles
    $userCentro = '';  // Obtener el valor de la sesión

    return view('admin/retos.edit', compact('retos', 'centros', 'torneos', 'userCentro'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',

        ]);

        
        $retos= Reto::findOrFail($id);
        $retos->update($request->all());

        return redirect()->route('retos.index')->with('success', 'Reto modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        $reto = Reto::findOrFail($id);
        $reto->delete();
 
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
}
