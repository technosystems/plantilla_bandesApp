<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "covid.inventario";

     protected $primaryKey = 'id_inventario';

    protected $fillable = ['id_tipo_prueba', 'cantidad', 'observacion', 'estatus', 'fecha'];

	protected $hidden = ['id_inventario'];

	public function getpru()
    {
        return $this->hasOne(Tipo_prueba::class, 'id_tipo_prueba', 'id_tipo_prueba');
	}

	public function obtenerInventario()
	{
	    return Inventario::all();
	}

	public function obtenerInventarioId($id)
	{
	    return Inventario::find($id);
	}

	


}
