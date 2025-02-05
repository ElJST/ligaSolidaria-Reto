<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','direccion','anotaciones'];

    public function centros()
    {
        return $this->hasMany(Centro::class, 'fk_sede', 'id_sede');
    }

}
