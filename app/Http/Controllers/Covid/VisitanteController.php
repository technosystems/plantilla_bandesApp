<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Visitante;
use App\Models\Existencia;
use App\Models\Personal;

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
    public function store(Request $request)
    {
        //
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
