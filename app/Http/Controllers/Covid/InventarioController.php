<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Inventario;
use App\Models\Tipo_prueba;
use App\Models\Existencia;


class InventarioController extends Controller
{
    protected $inv;

    public function __construct(Inventario $inv)
    {
        $this->inv = $inv;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inv = $this->inv->obtenerInventario();

        $list_tipo_pr = Tipo_prueba::get()->pluck('descripcion','id_tipo_prueba');

        $list_existencia = Existencia::get();
        
        //dd($inv);
        return view('covid.inventario.index', compact('inv','list_tipo_pr','list_existencia') );
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

         $data = array();
         $data['id_tipo_prueba'] = $request->id_tipo_prueba;
         $data['cantidad']       = $request->cantidad;
         $data['observacion']    = $request->observacion;
         $data['fecha']          = date("Y-m-d"); ;
         
        $guardar = Inventario::create($data);

        if($guardar) // si fue exitoso el insert
        {
            //traigo la existencia pa incrementarla
            $list_existencia = Existencia::get();

            $cantidad_act = $list_existencia[0]['existencia'];

            $new_cant = ($data['cantidad']+ $cantidad_act);

            /*actualizo la existencia de las pruebas*/
            Existencia::where('id', $list_existencia[0]['id'])
                        ->update(['existencia' => $new_cant]);
        
        }else{
           
        }

        //Inventario::create($request->only('name'));

        return redirect()->route('inventario.index');
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
         //dd($id);

          /*con esta funcion que viene del modelo me traigo el registro especifico
           y recupero la cantidad  para quitarcela a la existencia*/
        $model = $this->inv->obtenerInventarioId($id);

        $del_exit = $model->cantidad;

       //recupero la existencia pa incrementarla
        $list_existencia = Existencia::get();

        $cantidad_act = $list_existencia[0]['existencia'];

        $new_cant = ( $cantidad_act - $del_exit);

        /*actualizo la existencia de las pruebas*/
        Existencia::where('id', $list_existencia[0]['id'])
                    ->update(['existencia' => $new_cant]);

       return redirect()->route('inventario.index');
    }
}
