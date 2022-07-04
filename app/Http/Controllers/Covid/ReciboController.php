<?php

namespace App\Http\Controllers\Covid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Personal;
use App\Models\Existencia;
use App\Models\Movimientos;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;

class ReciboController extends Controller
{
    private $fpdf;

    public function __construct()
    {

    }

    public function create($id)
    {

    	$id_movimiento = $id;

    	$sql_infor1 = DB::select('SELECT
                                covid.movimientos.id,
                                covid.movimientos.desde,
                                covid.movimientos.hasta,
                                covid.movimientos.resultado,
                                general.personal.tx_nombres,
                                general.personal.tx_apellidos,covid.movimientos.observacion
                                FROM covid.movimientos
                                INNER JOIN general.personal on (general.personal.id_personal = covid.movimientos.id_personal)
                                WHERE covid.movimientos.id =?',[$id_movimiento]);

    	$resultado = "";
    	if($sql_infor1[0]->resultado == 1)
    	{
    		$resultado = "NEGATIVO";
    	}else{
    		$resultado = "POSITIVO";
    	}
    	//dd($sql_infor1);

        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('helvetica','B',8);
        $this->fpdf->AddPage("L", ['50', '70']);
        $this->fpdf->Image('assets/img/logo_color.png',2,2,20,5,'PNG');
        $this->fpdf->Ln(5);
        $this->fpdf->Text(20,16, "PRUEBA DE HISOPADO");
        $this->fpdf->Ln(6);
        $this->fpdf->SetFont('helvetica','',7);
        $this->fpdf->Text(5,21, "NOMBRE Y APELLIDO: ".$sql_infor1[0]->tx_nombres.' '.$sql_infor1[0]->tx_apellidos);
        $this->fpdf->Text(5,27, "VALIDO:  " .$sql_infor1[0]->desde.'   HASTA:   '.$sql_infor1[0]->hasta);
        $this->fpdf->Text(5,33, "RESULTADO: ".$resultado);
        $this->fpdf->Text(5,38, "OBSERVACION: ".$sql_infor1[0]->observacion);

        //$this->fpdf->Cell(50,5,utf8_decode("NÚMERO O CÓDIGO DE CLIENTE:"),1,1,'L');

        $this->fpdf->Output();
        exit;
    }
}
