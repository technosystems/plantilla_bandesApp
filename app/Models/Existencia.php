<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;

    protected $table = "covid.existencia";

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['existencia'];

    public function obtenerExistencia()
	{
	    return Existencia::orderBy('id', 'DESC')->get();
	}

}
