<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = "general.personal";

   	//public $timestamps = false;

    protected $primaryKey = 'id_personal';

    protected $fillable = ['id_personal' ,'tx_nombres', 'tx_apellidos', 'cedula', 'id_estatus', 'id_gerencia','convocado'];

	protected $hidden = ['created_at', 'updated_at'];

	public function obtenerPersonal()
	{
	    return Personal::orderBy('id_inventario', 'DESC')->get();
	}

	public function obtenerPersonalId($id)
	{
	    return Personal::find($id);
	}

	public function getgerencia()
    {
        return $this->hasOne(Gerencia::class, 'id_gerencia', 'id_gerencia');
	}
}
