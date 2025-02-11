<?php
 
/**
 * Created by Reliese Model.
 */
 
namespace App\Models;
 
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Partido
 *
 * @property int $id_partido
 * @property int $fk_torneo
 * @property int|null $eq_local
 * @property int|null $eq_visitante
 * @property int|null $goles_local
 * @property int|null $goles_visitante
 * @property Carbon|null $fecha_partido
 * @property Carbon|null $hora_partido
 * @property bool|null $fases
 *
 * @property Equipo|null $equipo
 * @property Torneo $torneo
 *
 * @package App\Models
 */
class Partido extends Model
{
    protected $table = 'partidos';
    protected $primaryKey = 'id_partido';
    public $timestamps = false;
 
    protected $casts = [
        'fk_torneo' => 'int',
        'eq_local' => 'int',
        'eq_visitante' => 'int',
        'goles_local' => 'int',
        'goles_visitante' => 'int',
        'fecha_partido' => 'datetime',
        'hora_partido' => 'datetime',
        'fases' => 'bool'
    ];
 
    protected $fillable = [
        'fk_torneo',
        'eq_local',
        'eq_visitante',
        'goles_local',
        'goles_visitante',
        'fecha_partido',
        'hora_partido',
        'fases'
    ];
 
   
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'eq_local');
    }
 
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'eq_visitante');
    }
 
 
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'eq_visitante');
    }
 
    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'fk_torneo');
    }
}