<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Visitante;
use App\Models\Existencia;
use App\Models\Personal;

use App\Models\Movimientos;


class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $list_existencia = Existencia::get();
        return view('covid.visitante.index',
        compact('list_existencia'));*/

        $list_existencia = Existencia::get();

        $id_estatus = 4;

        $visitante =  Visitante::where('id_estatus', $id_estatus)->count();

        return view('covid.visitante.index',compact('list_existencia','visitante'));
           $list_existencia = Existencia::get();
    }

    public function getVisitante()
    {
       /*  $data =Personal::where('id_estatus', '=', 4) // id_estatus 4 = visitante
                ->get();
        //dd($data);
        return $data;*/
        $id_estatus = 4;
        $data =  Visitante::where('id_estatus', $id_estatus)->get();
        //dd($data);
        return $data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function getMovimientos()
    {
       /*  $data =Personal::where('id_estatus', '=', 4) // id_estatus 4 = visitante
                ->get();
        //dd($data);
        return $data;*/

        $data2 =  Movimientos::get();
        //dd($data2);
        return $data2;
    }
  public function store(Request $request)
    {
        //dd($request);

         $id_estatus = "4";

         $data = array();
         $data['tx_nombres']   = $request->tx_nombres;
         $data['tx_apellidos'] = $request->tx_apellidos;
         $data['cedula']       = $request->cedula;
         $data['id_estatus']   = $id_estatus;

         $guardar = Visitante::create($data);

        if($guardar) // si fue exitoso el insert
        {
           $id = $guardar->id_personal;

           $list_visitante = Visitante::get();

          $id_personal = $list_visitante[0]['id_personal'];
             //dd($id_personal);
         $data2 = array();
         $data2['id_tipo_prueba'] = 1;
         $data2['desde']          = substr($request->flatpickr_range2, 0,10);
         $data2['hasta']          = substr($request->flatpickr_range2, -10);
         $data2['id_personal']    =  $id;
         $data2['resultado']       = $request->default_radio;
         $data2['observacion']     = $request->observaciones;

         $guardar = Movimientos::create($data2);  // }else{

        }else{
            // si esta mal redirigelo al home con un mensaje
        }

  /* if($guardar) // si fue exitoso el insert
        {
            //traigo la existencia pa incrementarla
            $list_existencia = Existencia::get();

            $cantidad_act = $list_existencia[0]['existencia'];

            $new_cant = ($data['cantidad']+ $cantidad_act);

            /*actualizo la existencia de las pruebas*/
          /*  Existencia::where('id', $list_existencia[0]['id'])
                        ->update(['existencia' => $new_cant]);

        }else{

        }*/

        //Inventario::create($request->only('name'));

  return redirect()->route('visitante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
