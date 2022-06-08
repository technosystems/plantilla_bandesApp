<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_prueba extends Model
{
    use HasFactory;

    protected $table = "covid.tipo_prueba";

     protected $primaryKey = 'id_tipo_prueba';

    protected $fillable = ['descripcion', 'estatus'];

	protected $hidden = ['id_tipo_prueba'];
	

	public function obtenerTipo_prueba()
	{
	    return Tipo_prueba::all();
	}

	public function obtenerTipo_pruebaId($id)
	{
	    return Tipo_prueba::find($id);
	}

	
}
