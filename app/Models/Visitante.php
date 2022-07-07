<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visitante extends Model
{
    use HasFactory;

    protected $table = "general.personal";

   	//public $timestamps = false;

    protected $primaryKey = 'id_personal';

    protected $fillable = ['id_personal' ,'tx_nombres', 'tx_apellidos', 'cedula','id_gerencia','id_estatus'];

	protected $hidden = ['created_at', 'updated_at'];

	public function obtenerVisitante()
	{
	  return Visitante::orderBy('id_inventario', 'DESC')->get();
	}

	public function obtenerPersonalId($id)
	{
	    return Visitante::find($id);
	}

	public function getgerencia()
    {
        return $this->hasOne(Gerencia::class, 'id_gerencia', 'id_gerencia');
	}
}
