<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $table = "covid.convocatoria";

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['id','tipo'];

    public function obtenerConvocatoria()
	{
	    return Convocatoria::orderBy('id', 'DESC')->get();
	}

}
