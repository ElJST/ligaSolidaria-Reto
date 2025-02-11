<?php
 
/**
 * Created by Reliese Model.
 */
 
namespace App\Models;
 
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Torneo
 *
 * @property int $id_torneo
 * @property string $nombre
 * @property int|null $fk_logo
 * @property int $fk_localizacion
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 *
 * @property Localizacione $localizacione
 * @property Collection|Partido[] $partidos
 * @property Collection|Patrocinadore[] $patrocinadores
 * @property Collection|Publicacione[] $publicaciones
 * @property Collection|Reto[] $retos
 *
 * @package App\Models
 */
class Torneo extends Model
{
    protected $table = 'torneos';
    protected $primaryKey = 'id_torneo';
    public $timestamps = false;
 
    protected $casts = [
        'fk_logo' => 'int',
        'fk_localizacion' => 'int',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime'
    ];
 
    protected $fillable = [
        'nombre',
        'fk_logo',
        'fk_localizacion',
        'fecha_inicio',
        'fecha_fin'
    ];
 
    public function localizacion()
    {
        return $this->belongsTo(Localizacione::class, 'fk_localizacion', 'id_localizacion');
    }
 
    public function partidos()
    {
        return $this->hasMany(Partido::class, 'fk_torneo', 'id_torneo');
    }
 
 
    public function patrocinadores()
    {
        return $this->hasMany(Patrocinadore::class, 'fk_torneo');
    }
 
    public function publicaciones()
    {
        return $this->hasMany(Publicacione::class, 'fk_torneo');
    }
 
    public function retos()
    {
        return $this->hasMany(Reto::class, 'fk_torneo');
    }
}