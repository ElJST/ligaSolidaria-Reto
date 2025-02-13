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
    $torneos = Torneo::all();
    $torneoSeleccionado = $request->input('fk_torneo');
   
    // Inicialmente, no se muestran centros hasta que se elija un torneo
    $centros = collect();
    $centroSeleccionado = null;
 
    // Si se selecciona un torneo, obtener los centros participantes en ese torneo
    if ($torneoSeleccionado) {
        $centros = Centro::whereHas('retos', function ($query) use ($torneoSeleccionado) {
            $query->where('fk_torneo', $torneoSeleccionado);
        })->get();
 
        $centroSeleccionado = $request->input('fk_centro');
    }
 
    // Construcción de la consulta de retos
    $query = Reto::query();
 
    if ($torneoSeleccionado) {
        $query->where('fk_torneo', $torneoSeleccionado);
 
        if ($centroSeleccionado) {
            $query->where('fk_centro', $centroSeleccionado);
        }
    }
 
    $retos = $query->with('multimedia')->paginate(6);
 
    return view('web_solidaria/retos.index', compact('torneos', 'centros', 'retos', 'torneoSeleccionado', 'centroSeleccionado'));
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
 
    return view('admin.retos.index', compact('retos'));
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
 
     // 2️ Crear el reto en la BD
     $reto = Reto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'estudios' => $request->estudios,
        'fk_centro' => $request->fk_centro,
        'fk_torneo' => $request->fk_torneo,
    ]);
 
    // 3️Redirigir a subir imagen pasando el ID del reto
    return redirect()->route('formulario.multimedia', ['foreignkey' => $reto->id_reto]);
}
 
 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reto = Reto::with('multimedia')->findOrFail($id);
        $centros = Centro::where('id_centro', $reto->fk_centro)->first();
        
        return view('web_solidaria/retos.show', compact('reto','centros'));
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
 
        return redirect()->route('formulario.multimedia', ['foreignkey' => $retos])->with('success', 'Reto modificado exitosamente');

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
 