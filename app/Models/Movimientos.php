<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;

    protected $table = "covid.movimientos";

   	//public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['id' ,'id_tipo_prueba', 'desde', 'hasta', 'resultado', 'id_personal','observacion','id_tipo_visita','id_user','id_estatus'];

	protected $hidden = ['created_at', 'updated_at'];

	public function obtenerMovimientos()
	{
	    return Movimientos::orderBy('id', 'DESC')->get();
	}

	public function obtenerMovimientosId($id)
	{
	    return Movimientos::find($id);
	}

	public function getPersonal()
    {
        return $this->hasOne(Personal::class, 'id_personal', 'id_personal');
	}
}
