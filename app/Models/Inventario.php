<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "covid.inventario";

    //public $timestamps = false;

    protected $primaryKey = 'id_inventario';

    protected $fillable = ['id_inventario','id_tipo_prueba', 'cantidad', 'observacion', 'fecha', 'id_estatus'];

	protected $hidden = ['created_at', 'updated_at'];

	public function getpru()
    {
        return $this->hasOne(Tipo_prueba::class, 'id_tipo_prueba', 'id_tipo_prueba');
	}

	public function obtenerInventario()
	{
	    return Inventario::orderBy('id_inventario', 'DESC')->get();
	}

	public function obtenerInventarioId($id)
	{
	    return Inventario::find($id);
	}

	


}
