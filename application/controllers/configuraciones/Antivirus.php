<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antivirus extends CI_Controller {
	private $modulo = "Antivirus";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Antivirus_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"antivirus" => $this->Antivirus_model->getAntivirus(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/antivirus/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/antivirus/add","",TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$descripcion = $this->input->post("descripcion");

			$data = array(
				"descripcion" => $descripcion,
				"estado" => 1
			);

			if ($this->Antivirus_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción del antivirus ".$descripcion);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/antivirus");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/antivirus/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/antivirus/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"antivir" => $this->Antivirus_model->getAntivir($id)
		);

		$this->load->view("admin/antivirus/view", $data);
	}
	public function delete($id){
		$antivir = $this->Antivirus_model->getAntivir($id);
		$data = array(
			"estado" => "0"
		);

		$this->Antivirus_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del antivirus ".$antivirus->descripcion);
		echo "configuraciones/antivirus";
	}

	public function edit($id){
		$contenido_interno = array(
			"antivir" => $this->Antivirus_model->getAntivir($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/antivirus/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idAntivir");
		$descripcion = $this->input->post("descripcion");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}
		$data = array(
			"descripcion" => $descripcion,
			"estado" => $estado
		);
		if ($this->Antivirus_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del antivirus ".$descripcion);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/antivirus");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/antivirus/edit/".$id);

		}

		
	}

	public function excel(){
		//Cargamos la librería de excel.
    	$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Antivirus');
        //Contador de filas
        $contador = 2;
        //Le aplicamos ancho las columnas.
        /*$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);*/
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nro.');	        
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Descripcion');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Estado');

        $antivirus = $this->Antivirus_model->getAntivirus();

         //Definimos la data del cuerpo.
        foreach($antivirus as $a){
        	//Incrementamos una fila más, para ir a la siguiente.
        	$contador++;
        	//Informacion de las filas de la consulta.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", $a->id);
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $a->descripcion);
	        $status = $a->estado == 1 ? "Activo":"Inactivo"; 
	        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $status);
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Listado_de_antivirus.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
	}

	public function excel2(){
		//Cargamos la librería de excel.
    	$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Antivirus');
        //Contador de filas
        $contador = 2;
        //Le aplicamos ancho las columnas.
        /*$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);*/
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
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
        $this->excel->getActiveSheet()->setCellValue("B1", 'Empresa de Transporte');	
        $this->excel->getActiveSheet()->setCellValue("C1",date("d-m-Y"));	
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Nro.');	        
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Descripcion');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Estado');

        $antivirus = $this->Antivirus_model->getAntivirus();

         //Definimos la data del cuerpo.
        foreach($antivirus as $a){
        	//Incrementamos una fila más, para ir a la siguiente.
        	$contador++;
        	//Informacion de las filas de la consulta.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", $a->id);
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $a->descripcion);
	        $status = $a->estado == 1 ? "Activo":"Inactivo"; 
	        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $status);
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Listado_de_antivirus.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');

	}


}