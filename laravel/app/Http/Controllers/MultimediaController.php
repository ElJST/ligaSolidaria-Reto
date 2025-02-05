<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reto;
use App\Models\Centro;
use App\Models\Torneo;
use App\Models\Multimedia;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $retos = Reto::all(); // Obtener todos los retos disponibles
    return view('multimedia.create', compact('retos'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar que se suba una imagen
    $request->validate([
        'fk_reto' => 'required|exists:retos,id_reto',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Guardar la imagen en storage/app/public/multimedia y obtener la ruta
    $rutaImagen = $request->file('imagen')->store('multimedia', 'public');

    // Insertar en la base de datos
    $multimedia = new Multimedia();
    $multimedia->fk_reto = $request->fk_reto;
    $multimedia->foto = $rutaImagen;
    // $multimedia->tipo = $request->file('imagen')->getClientMimeType(); // Guardar el tipo de archivo
    $multimedia->save();

    return redirect()->back()->with('success', 'Imagen subida correctamente');
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
