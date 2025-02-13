<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reto extends Model
{
    use HasFactory;

    protected $table = 'retos';

    public $timestamps = false;

    protected $primaryKey = 'id_reto';
    protected $fillable = ['fk_centro','fk_torneo','nombre','descripcion','estudios'];
    
    public function centro()
    {
        return $this->belongsTo(Centro::class, 'fk_centro', 'id_centro');
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'fk_torneo', 'id_torneo');
    }

    public function multimedia()
{
    return $this->hasMany(Multimedia::class, 'fk_reto', 'id_reto');
}

    
}
