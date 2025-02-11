<?php
 
/**
 * Created by Reliese Model.
 */
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Centro
 *
 * @property int $id_centro
 * @property int $fk_sede
 * @property string $nombre
 * @property string $direccion
 * @property string|null $anotaciones
 *
 * @property Sede $sede
 * @property Collection|Equipo[] $equipos
 * @property Collection|Estudio[] $estudios
 * @property Collection|Publicacione[] $publicaciones
 * @property Collection|Reto[] $retos
 *
 * @package App\Models
 */
class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro';
    public $timestamps = false;
 
    protected $casts = [
        'fk_sede' => 'int'
    ];
 
    protected $fillable = [
        'fk_sede',
        'nombre',
        'web',          // Añadido campo web
        'fk_logo',      // Añadido campo fk_logo
        'direccion',
        'anotaciones'
    ];
 
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede');
    }
 
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'fk_centro', 'id_centro');
    }
 
    public function logo()
    {
        return $this->belongsTo(Multimedia::class, 'fk_logo', 'id_media');
    }
 
    public function estudios()
    {
        return $this->hasMany(Estudio::class, 'fk_centro');
    }
 
    public function publicaciones()
    {
        return $this->hasMany(Publicacione::class, 'fk_centro');
    }
 
    public function retos()
    {
        return $this->hasMany(Reto::class, 'fk_centro');
    }
 
    public function torneos()
    {
        return $this->belongsToMany(Torneo::class, 'retos', 'fk_centro', 'fk_torneo');
    }
}