<?php
 
namespace App\Http\Controllers;
 
 
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Sede;
 
class CentroController extends Controller
{
    /**
     * Muestra todos los centros
     */
    public function index()
    {
        $centros = Centro::all(); // Obtiene todos los centros y envia a la vista
        return view('centros.index', compact('centros'));
    }
 
    /**
     * Muestra un centro específico
     */
    public function show(Request $request)
    {
        $centro = Centro::find($request->centro_id); // Obtener el centro por el ID
 
        if (!$centro) {
            return redirect()->route('centros.index')->with('error', 'Centro no encontrado');
        }
 
        return view('centros.show', compact('centro')); // Mostrar la vista de detalles del centro
    }
 
 
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion'=> 'required|string|max:255',
            'anotaciones' => 'nullable|string',
        ]);
 
        // Buscar el centro en la base de datos
        $centro = Centro::findOrFail($id);
 
        // Actualizar los datos
        $centro->nombre = $request->nombre;
        $centro->direccion=$request->direccion;
        $centro->anotaciones = $request->anotaciones;
        $centro->save(); // Guardar cambios
 
        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'Centro actualizado correctamente');
    }
 
 
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sede_nombre' => 'required|string|max:255',
            'sede_direccion' => 'required|string|max:255',
            'sede_anotaciones' => 'nullable|string',
 
            'centro_nombre' => 'required|string|max:255',
            'centro_direccion' => 'required|string|max:255',
            'centro_anotaciones' => 'nullable|string',
        ]);
 
        // Crear una nueva sede
        $sede = new Sede(); // Asegúrate de tener el modelo Sede
        $sede->nombre = $request->sede_nombre;
        $sede->direccion = $request->sede_direccion;
        $sede->anotaciones = $request->sede_anotaciones;
        $sede->save();
 
        // Crear un nuevo centro y asociarlo a la sede recién creada
        $centro = new Centro(); // Asegúrate de tener el modelo Centro
        $centro->nombre = $request->centro_nombre;
        $centro->direccion = $request->centro_direccion;
        $centro->anotaciones = $request->centro_anotaciones;
        $centro->fk_sede = $sede->id_sede; // Relacionar el centro con la sede creada
        $centro->save();
 
        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'Sede y centro agregados correctamente');
    }
}