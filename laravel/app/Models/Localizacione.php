<?php
 
/**
 * Created by Reliese Model.
 */
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Localizacione
 *
 * @property int $id_localizacion
 * @property string $nombre
 * @property string $direccion
 * @property string|null $anotaciones
 *
 * @property Collection|Torneo[] $torneos
 *
 * @package App\Models
 */
class Localizacione extends Model
{
    protected $table = 'localizaciones';
    protected $primaryKey = 'id_localizacion';
    public $timestamps = false;
 
    protected $fillable = [
        'nombre',
        'direccion',
        'anotaciones'
    ];
 
    public function torneos()
    {
        return $this->hasMany(Torneo::class, 'fk_localizacion');
    }
}