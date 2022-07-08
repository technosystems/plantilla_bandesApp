<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Personal;
use App\Models\Existencia;
use App\Models\Inventario;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $list_existencia = Existencia::get();

        $id_estatus = 3; 

        $personal =  Personal::count();

        return view('covid.reportes.index',compact('list_existencia','personal'));
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

       $desde = $request->desde_inv;
       $hasta = $request->hasta_inv;

       //dd($desde."-".$hasta);

        $sql_infor1 = DB::select("SELECT id_inventario, id_tipo_prueba, cantidad, observacion, id_estatus,fecha
                                FROM covid.inventario
                                where fecha >= '$desde' and fecha <= '$hasta'");
       
         $pdf = new Fpdf;
         $pdf->AddPage('P','Letter');
         
         $pdf->Image('assets/img/logo_color.png',10,5,40,10,'PNG');

         $pdf->SetFont('Arial','',12);
         $pdf->Ln(10);
         $pdf->Cell(190,5,utf8_decode("Listado de Movimiento del Inventario de Pruebas de Hisopado"),0,1,'C');
         
         $pdf->SetFont('Arial','',10);
         $pdf->Ln(5);
         $pdf->SetXY(20, 30);
         $pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
         $pdf->SetFillColor(4, 138, 4); // establece el color del fondo de la celda (en este caso es AZUL 
         $pdf->Cell(30,5,utf8_decode("FECHA"),1,1,'C',True);
         $pdf->SetXY(50, 30);
         $pdf->Cell(30,5,utf8_decode("CANTIDAD"),1,1,'C',True);
         $pdf->SetXY(80, 30);
         $pdf->Cell(100,5,utf8_decode("OBSERVACION"),1,1,'C',True);

           $pdf->SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco)
            foreach($sql_infor1 as $emp){

                     $pdf->SetX(20);
                     $pdf->Cell(30,5,$emp->fecha,1,'C');
                     //$pdf->SetXY(20, 30);
                     $pdf->Cell(30,5,$emp->cantidad,1,'C');
                    // $pdf->SetXY(20, 30);
                     $pdf->Cell(100,5,$emp->observacion,1,'C');
                     $pdf->Ln(5);
                 }

        $pdf->Output();
        exit;
    }

    public function pdfmov(Request $request)
    {
        //dd($request);

        $desde = $request->desde_prb;
       $hasta = $request->hasta_prb;

       //dd($desde."-".$hasta);

        $sql_infor1 = DB::select("SELECT id, desde, hasta, resultado, movimientos.id_personal, observacion, id_user,
                        movimientos.id_estatus,personal.cedula,personal.tx_nombres,personal.tx_apellidos,personal.id_estatus as estatus_personal,
                        gerencia.descripcion
                        FROM covid.movimientos
                        inner join general.personal on (general.personal.id_personal = covid.movimientos.id_personal)
                        inner join general.gerencia on (general.gerencia.id_gerencia = general.personal.id_gerencia )
                        where desde >= '$desde' and desde <= '$hasta'");
       
         $pdf = new Fpdf;
         $pdf->AddPage('L','Letter');
         
         $pdf->Image('assets/img/logo_color.png',10,5,40,10,'PNG');

         $pdf->SetFont('Arial','B',12);
         $pdf->Ln(10);
         $pdf->Cell(250,5,utf8_decode("Listado de Movimiento Pruebas de Hisopado al Personal"),0,1,'C');
         
         $pdf->SetFont('Arial','B',8);
         $pdf->Ln(5);
         $pdf->SetXY(10, 30);
         $pdf->SetTextColor(255,255,255);  // Establece el color del texto
         $pdf->SetFillColor(4,138,4); // establece el color del fondo de la celda 
         $pdf->Cell(40,5,utf8_decode("SEMANA"),1,1,'C','true');
         $pdf->SetXY(50, 30);
         $pdf->Cell(20,5,utf8_decode("CEDULA"),1,1,'C','true');
         $pdf->SetXY(70, 30);
         $pdf->Cell(30,5,utf8_decode("APELLIDO"),1,1,'C','true');
         $pdf->SetXY(100, 30);
         $pdf->Cell(30,5,utf8_decode("NOMBRE"),1,1,'C','true');
         $pdf->SetXY(130, 30);
         $pdf->Cell(30,5,utf8_decode("EMPLEADO"),1,1,'C','true');
         $pdf->SetXY(160, 30);
         $pdf->Cell(80,5,utf8_decode("GERENCIA"),1,1,'C','true');
         $pdf->SetXY(240, 30);
         $pdf->Cell(30,5,utf8_decode("RESULTADO"),1,1,'C','true');
 
             $pdf->SetTextColor(0,0,0); 
            foreach($sql_infor1 as $emp){

                     //$pdf->SetX(20);
                     $pdf->Cell(40,5,$emp->desde." / ".$emp->hasta ,1,'C');
                     $pdf->Cell(20,5,$emp->cedula,1,'C');
                     $pdf->Cell(30,5,$emp->tx_apellidos,1,'C');
                     $pdf->Cell(30,5,$emp->tx_nombres,1,'C');

                     $est_per = "";
                     if($emp->estatus_personal == 3)
                     {
                        $est_per = "Empleado";
                     }
                     else{
                         $est_per = "Visitante";
                     }

                     $pdf->Cell(30,5,$est_per,1,'C');
                     $pdf->Cell(80,5,$emp->descripcion,1,'C');

                     $resul = "";
                     if($emp->resultado == 1)
                     {
                        $resul = "Negativo";
                     }
                     else{
                         $resul = "Positivo";
                     }

                     $pdf->Cell(30,5,$resul,1,'C');
                     $pdf->Ln(5);
                 }

        $pdf->Output();
        exit;
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
