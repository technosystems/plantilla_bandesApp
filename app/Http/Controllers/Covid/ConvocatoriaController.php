<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Convocatoria;
use App\Models\Personal;
use App\Models\Existencia;
use App\Models\Inventario;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd($request);
         $model = Convocatoria::get();

          return view('covid.convocatoria.index',compact('model'));
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
    public function store(Request $request)
    {
        //dd($request);

         $fecha = date('Y-m-d');

         $model = Convocatoria::get();

         $tipo  = $request->tipo_convoca;
         
         $id_estatus = 3;

        /*actualizo el tipo de convocatoria 1: lista, 2: General */

        Convocatoria::where('id', $model[0]['id'])->update(['tipo' => $tipo]);

         Personal::where('id_estatus', $id_estatus)->update(['convocado' => null]);

        if( $tipo == 2)//general
        {
            return redirect('/personal');
        }
        if($tipo == 1)// lista
        {
            return redirect('/lista');
        }


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
