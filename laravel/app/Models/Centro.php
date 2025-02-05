<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $table = 'centros';
    protected $primaryKey = 'id_centro';

    protected $fillable = ['fk_sede','nombre','direccion','anotaciones'];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede', 'id_sede');
    }

    public function retos()
    {
        return $this->hasMany(Reto::class, 'fk_centro', 'id_centro');
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'fk_centro', 'id_centro');
    }

}
