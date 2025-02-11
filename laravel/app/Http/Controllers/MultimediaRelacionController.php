<?php
namespace App\Http\Controllers;
 
use App\Models\Multimedia;
use Illuminate\Http\Request;
class MultimediaRelacionController extends Controller
{
    public function index($foreignkey)
    {
        $relaciones = Multimedia::all();
        //los tipos pueden ser publicaciones,retos,partidos,participantes,equipos
        $tipo = "retos";
        return view('web_solidaria.multimedia.formulario', compact('relaciones','tipo','foreignkey'));
    }
    //funcion para almacenar fotos en la base de datos,recibiendo por parametros el string de la foto,descripcion,tipo y la foreign key
    public function guardarMultimedia(Request $request)
    {
        // Validación de los parámetros
        $request->validate([
            'foto' => 'required|string',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|string',
            'fk' => 'required|integer',
        ]);
 
        $foto = $request->input('foto');
        $descripcion = $request->input('descripcion');
        $tipo = $request->input('tipo');
        $fk = $request->input('fk');
 
        $column = '';
        switch ($tipo) {
            case 'partidos':
                $column = 'fk_partido';
                break;
            case 'publicaciones':
                $column = 'fk_publicacion';
                break;
            case 'equipos':
                $column = 'fk_equipo';
                break;
            case 'participantes':
                $column = 'fk_participante';
                break;
            case 'retos':
                $column = 'fk_reto';
                break;
            default:
                return response()->json(['mensaje' => 'Error: Tipo no válido.'], 400);
        }
 
        $multimedia = new Multimedia();
        $multimedia->foto = $foto;
        $multimedia->descripcion = $descripcion;
        $multimedia->{$column} = $fk;
        $multimedia->save();
 
        return response()->json([
            'mensaje' => 'Datos insertados correctamente',
            'id_creado' => $multimedia->id_media
        ]);
    }
}
?>