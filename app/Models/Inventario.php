<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "covid.inventario";

    protected $fillable = ['id_tipo_prueba', 'cantidad', 'observacion', 'estatus', 'fecha'];

	protected $hidden = ['id_inventario'];

	public function obtenerInventario()
	{
	    return Inventario::all();
	}

	public function obtenerInventarioId($id)
	{
	    return Inventario::find($id);
	}


}
