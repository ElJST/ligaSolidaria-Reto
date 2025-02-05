<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','direccion','anotaciones'];

    public function torneos()
    {
        return $this->hasMany(Torneo::class, 'fk_localizacion', 'id_localizacion');
    }

}
