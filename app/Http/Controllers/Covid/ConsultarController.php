<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Personal;
use App\Models\Movimientos;


class ConsultarController extends Controller
{
    //

    public function index(Request $request)
    {
         $id_personal = $request->id;
         $id_personal = base64_decode($id_personal); 

    	//$data = Movimientos::get(); 
        $datos = Movimientos::where('id_personal', $id_personal)
                             ->orderBy('id','DESC')
                             ->get();
        $datos_personal = Personal::where('id_personal', $id_personal)
                             ->get(); 

        $idEstatusPersonal = $datos_personal[0]->id_estatus; 
       // dd($id_st_per);          
        return view('covid.consulta.index',compact('datos','idEstatusPersonal'));
    }

    public function getMovimiento(Request $request)
    {
        
        $id_personal = $request->id_personal; 
    	//dd($id_personal);
    	//$id_personal = 1;
    	//$data = Movimientos::get(); 
        $data = Movimientos::where('id_personal', $id_personal)->get(); 
        //dd($data);
        return $data;
    }

    public function consulta()
    {
        
        //$data = Movimientos::get(); 
        $datos = Movimientos::orderBy('id','DESC')
                             ->get();

       /* $datos_personal = Personal::where('id_personal', $id_personal)
                             ->get();*/ 

       /* $idEstatusPersonal = $datos_personal[0]->id_estatus; */
       // dd($id_st_per);          
        return view('covid.consulta.view',compact('datos'));
    }

}
