<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Superheroe extends Model
{
    use SoftDeletes; // Habilita el borrado lógico

    protected $table = 'superheroes';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre_real', 'alias', 'foto', 'informacion', 'activo'];

    // Indica el campo que usará SoftDeletes
    protected $dates = ['deleted_at'];

    /**
     * Scope para filtrar los superhéroes activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}

