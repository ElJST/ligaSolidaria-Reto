<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Multimedia extends Model
{
    use HasFactory;
 
    // Si el nombre de la tabla no sigue la convención plural, defínelo explícitamente
    protected $table = 'multimedia';
 
    // Si tu campo 'id_media' es la clave primaria y no sigue la convención, defínelo aquí
    protected $primaryKey = 'id_media';
 
    // Si no usas los timestamps, puedes desactivarlos
    public $timestamps = false;
 
    // Definir los campos que son asignables
    protected $fillable = [
        'foto',
        'fk_partido',
        'fk_publicacion',
        'fk_equipo',
        'fk_participante',
        'fk_reto',
    ];
 
    // Relacionar con otras tablas (si aplica)
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'fk_partido');
    }
 
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'fk_publicacion');
    }
 
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'fk_equipo');
    }
 
    public function participante()
    {
        return $this->belongsTo(Participante::class, 'fk_participante');
    }
 
    public function reto()
    {
        return $this->belongsTo(Reto::class, 'fk_reto', 'id_reto');
    }
}