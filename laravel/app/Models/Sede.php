<?php
 
/**
 * Created by Reliese Model.
 */
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Sede
 *
 * @property int $id_sede
 * @property string $nombre
 * @property string $direccion
 * @property string|null $anotaciones
 *
 * @property Collection|Centro[] $centros
 *
 * @package App\Models
 */
class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'id_sede';
    public $timestamps = false;
 
    protected $fillable = [
        'nombre',
        'direccion',
        'anotaciones'
    ];
 
    public function centros()
    {
        return $this->hasMany(Centro::class, 'fk_sede');
    }
}