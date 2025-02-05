<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','fk_logo','fk_localizacion','fecha'];

    protected $table = 'torneos';
    protected $primaryKey = 'id_torneo';

    public function retos()
    {
        return $this->hasMany(Reto::class, 'fk_torneo', 'id_torneo');
    }

    public function localizacion()
    {
        return $this->belongsTo(Localizacion::class, 'fk_localizacion', 'id_localizacion');
    }

}
