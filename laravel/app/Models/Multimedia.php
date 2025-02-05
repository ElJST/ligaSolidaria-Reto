<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_multimedia'; // Clave primaria de la tabla

    public $timestamps = false; // Si tu tabla no tiene created_at y updated_at

    protected $fillable = ['fk_reto', 'foto']; // Campos que se pueden llenar

    // Relación con el modelo Reto
    public function reto()
    {
        return $this->belongsTo(Reto::class, 'fk_reto', 'id_reto');
    }
}

