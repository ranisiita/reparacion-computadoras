<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;
    protected $table = 'equipos';

    protected $fillable = [
        'tipo_equipo',
        'marca_modelo',
        'problema_reportado',
        'nombre_cliente',
        'telefono',
        'estado'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function getEquipos()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    public static function getEquipoById($id)
    {
        return self::find($id);
    }

    public static function createEquipo($data)
    {
        return self::create($data);
    }

    public function updateEquipo($data)
    {
        return $this->update($data);
    }

    public static function deleteEquipo(Equipo $equipo)
    {
        $equipo->delete();
    }
}
