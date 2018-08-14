<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computadoras extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Computadoras_model");
	}

	public function index(){
		$fecinicio = $this->input->post("fecinicio");
		$fecfin = $this->input->post("fecfin");

		if ($this->input->post("buscar")) {
			$computadoras = $this->Computadoras_model->getComputadoras(false,"",$fecinicio,$fecfin);
		}
		else{
			$computadoras = $this->Computadoras_model->getComputadoras(false,"");
		}

		$contenido_interno = array(
			"computadoras" => $computadoras,
			"fecinicio" => $fecinicio,
			"fecfin" => $fecfin

		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/reportes/computadoras",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}


	public function exportcomputadoras(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		$searchfecha = $this->input->post("searchfecha");
		$search = $this->input->post("search");
		$tipoarchivo = $this->input->post("tipoarchivo");
		if ($tipoarchivo == 1) {
			//Cargamos la librería de excel.
	    	$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
	        $this->excel->getActiveSheet()->setTitle('Antivirus');
	        //Contador de filas
	        $contador = 3;
	        //Le aplicamos ancho las columnas.
	        /*$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);*/
	        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
	        $this->excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
	        //Le aplicamos negrita a los títulos de la cabecera.
	        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
	       	$this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);
	        //
	        $this->excel->getActiveSheet()->getRowDimension(1)->setRowHeight(35);
	        $objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName("logo");
			$objDrawing->setDescription("Tt's my logo");
			$objDrawing->setPath("./assets/images/logo.png");
			$objDrawing->setOffsetY(10);
			$objDrawing->setOffsetX(10);
			$objDrawing->setCoordinates('A1');
			$objDrawing->setWidth(30);
			$objDrawing->setHeight(30);
			$objDrawing->setWorksheet($this->excel->getActiveSheet());

	        //Definimos los títulos de la cabecera.
	        $this->excel->getActiveSheet()->setCellValue("C1", 'Empresa de Transporte');	
	        $this->excel->getActiveSheet()->setCellValue("D1",date("d-m-Y"));	
	        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nro.');	        
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Codigo');
	        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Presentacion');
	        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proveedor');
	        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Contacto');
	        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Fabricante');
	        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Finca');
	        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Area');
	        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Procesador');
	        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Disco Duro');
	        $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Monitor');
	        $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Memoria RAM');
	        $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Sistema Operativo');
	        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Serial S.O');
	        $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Office');
	        $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Serial Office');
	        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Antivirus');
	        $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'Bitacora');
	        $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'IP');
	        $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'MAC');
	        $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'Ultimo Mant.');
	        $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'Usuario');
	        $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'Fec. Registro');
	        $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'Estado');

	        if ($fechainicio != "" && $fechafin != "") {
	        	$computadoras = $this->Computadoras_model->getComputadoras(false,$search,$fechainicio,$fechafin);
	        }else{
	        	$computadoras = $this->Computadoras_model->getComputadoras(false,$search,false,false);
	        }


	         //Definimos la data del cuerpo.
	        $i = 1;
	        foreach($computadoras as $c){
	        	//Incrementamos una fila más, para ir a la siguiente.
	        	$contador++;
	        	//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $i);
		        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $c->codigo);
		        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $c->presentacion);
		        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $c->proveedor);
		        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $c->contacto);
		        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $c->fabricante);
		        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $c->finca);
		        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $c->area);
		        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $c->velocidad);
		        $this->excel->getActiveSheet()->setCellValue("J{$contador}", $c->disco);
		        $this->excel->getActiveSheet()->setCellValue("K{$contador}", $c->monitor);
		        $this->excel->getActiveSheet()->setCellValue("L{$contador}", $c->memoria);
		        $this->excel->getActiveSheet()->setCellValue("M{$contador}", $c->sistema);
		        $this->excel->getActiveSheet()->setCellValue("N{$contador}", $c->serial_so);
		        $this->excel->getActiveSheet()->setCellValue("O{$contador}", $c->office);
		        $this->excel->getActiveSheet()->setCellValue("P{$contador}", $c->serial_office);
		        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $c->antivirus);
		        $this->excel->getActiveSheet()->setCellValue("R{$contador}", $c->bitacora);
		        $this->excel->getActiveSheet()->setCellValue("S{$contador}", $c->ip);
		        $this->excel->getActiveSheet()->setCellValue("T{$contador}", $c->mac);
		        $this->excel->getActiveSheet()->setCellValue("U{$contador}", $c->ultimo_mante);
		        $this->excel->getActiveSheet()->setCellValue("V{$contador}", $c->nombres);
		        $this->excel->getActiveSheet()->setCellValue("W{$contador}", $c->fecregistro);
		        $status = $c->estado == 1 ? "Activo":"Inactivo"; 
		        $this->excel->getActiveSheet()->setCellValue("X{$contador}", $status);

		        $i++;
	        }
	        //Le ponemos un nombre al archivo que se va a generar.
	        $archivo = "Listado_de_computadoras".date("dmYHis").".xls";
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'.$archivo.'"');
	        header('Cache-Control: max-age=0');
	        $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
	        //Hacemos una salida al navegador con el archivo Excel.
	        $objWriter->save('php://output');
		}
		else{
			 $this->load->library('Pdf');
	        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
	        
	  
	        $pdf->SetTitle('Reporte de computadoras '.date("d-m-Y"));

			$pdf->SetPrintHeader(false);

			// Establecer el tipo de letra
			 
			//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
			// Helvetica para reducir el tamaño del archivo.
        	$pdf->SetFont('times', '', 10, '', true);

			// Añadir una página
			// Este método tiene varias opciones, consulta la documentación para más información.
			$pdf->AddPage("L");

        	//preparamos y maquetamos el contenido a crear
	        $html = '';
	        $html .= "<style type=text/css>";
	        $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
	        $html .= "h1{text-align: center;}";
	        $html .="#content {position: relative;}";
	        $html .="
				#content img {
				    position: absolute;
				    top: 0px;
				    right: 0px;
				}";
	        /*$html .= "img{float: left; top:0; position:absolute;}";*/
	        $html .= "</style>";

	        $html .= '<table width="100%" cellpadding="3" border="1"><thead>';
	        $html .= '<tr>';

	        $html .= '<td width="15%" rowspan="2">
					<img src="'.base_url("assets/images/logo.png").'" width="30" height="30">
	        </td>';
	        $html .= '<td width="70%" rowspan="2" style="font-weight:bold;text-align:center;margin-top:30px !important;"><h1>Empresa de Transporte</h1></td>';
	        $html .= '<td width="15%" style="font-weight:bold;text-align:center;">Fecha</td>';
	        $html .= '</tr>';
	        $html .= '<tr>';

	        $html .= '<td style="text-align:center;">'.date("d-m-Y").'</td>';
	        $html .= '</tr>';
	        $html .= '</thead></table>';

	        $html .= '<h2 style="text-align:center;">Reportes de Computadoras</h2>';
	
	        $html .= '<table width="100%" cellpadding="3" border="1"><thead>';
	        $html .= '<tr>';
	        $html .= "<th>#</th>";
            $html .= '<th>Codigo</th>';
            $html .= '<th>Finca</th>';
            $html .= '<th>Area</th>';
            $html .= '<th>Procesador</th>';
            $html .= '<th>Disco Duro</th>';
            $html .= '<th>Monitor</th>';
            $html .= '<th>Memoria RAM</th>';
            $html .= '<th>Serial S.O</th>';
            
            $html .= '<th>Usuario</th>';
            $html .= '<th>Estado</th></tr></thead><tbody>';


            if ($fechainicio != "" && $fechafin != "") {
	        	$computadoras = $this->Computadoras_model->getComputadoras(false,$search,$fechainicio,$fechafin);
	        }else{
	        	$computadoras = $this->Computadoras_model->getComputadoras(false,$search,false,false);
	        }
        
	        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
	         foreach ($computadoras as $computadora){
	         	$html.='<tr>';
                $html.='<td>'.$computadora->id.'</td>';
                $html.='<td>'.$computadora->codigo.'</td>';
                $html.='<td>'.$computadora->finca.'</td>';
                $html.='<td>'.$computadora->area.'</td>';
                $html.='<td>'.$computadora->velocidad.'</td>';
                $html.='<td>'.$computadora->disco.'</td>';
                $html.='<td>'.$computadora->monitor.'</td>';
                $html.='<td>'.$computadora->memoria.'</td>';
                
                $html.='<td>'.$computadora->serial_so.'</td>';
                
                $html.='<td>'.$computadora->nombres.'</td>';
                $status = $computadora->estado == 1 ? "Activo":"Inactivo";
                $html.='<td>'.$status.'</td></tr>';
               
	         }

	         $html.='</tbody></table>';

			// Imprimimos el texto con writeHTMLCell()
        	$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = '', $autopadding = true);

			// ---------------------------------------------------------
			// Cerrar el documento PDF y preparamos la salida
			// Este método tiene varias opciones, consulte la documentación para más información.
        	$nombre_archivo = utf8_decode("Reportes_de_computadoras_".date("dmYHis").".pdf");
        	$pdf->Output($nombre_archivo, 'D');
		}
	
	}
}