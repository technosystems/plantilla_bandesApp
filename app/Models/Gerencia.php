<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    use HasFactory;

    protected $table = "general.gerencia";

   	//public $timestamps = false;

    protected $primaryKey = 'id_gerencia';

    protected $fillable = ['id_gerencia' ,'name', 'ente', 'status'];

	protected $hidden = ['created_at', 'updated_at'];

	public function obtenerGerencia()
	{
	    return Gerencia::orderBy('id_inventario', 'DESC')->get();
	}

	public function obtenerGerenciaId($id)
	{
	    return Gerencia::find($id);
	}
}
