<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitores extends CI_Controller {
	private $modulo = "Monitores";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Monitores_model");
		$this->load->model("Areas_model");
		$this->load->model("Fabricantes_model");
		$this->load->model("Fincas_model");
		$this->load->model("Proveedores_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"monitores" => $this->Monitores_model->getMonitores(false,""),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/monitores/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
			"proveedores" => $this->Proveedores_model->getProveedores(),
			"fincas" => $this->Fincas_model->getFincas(),
			"areas" => $this->Areas_model->getAreas(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/monitores/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$codigo = $this->input->post("codigo");
			$tamaño = $this->input->post("tamaño");
			$proveedor = $this->input->post("proveedor");
			$finca = $this->input->post("finca");
			$area = $this->input->post("area");
			$contacto = $this->input->post("contacto");
			$fabricante = $this->input->post("fabricante");
			$serial_fabricante = $this->input->post("serial_fabricante");
			
			$referencia = $this->input->post("referencia");
			$tamaño = $this->input->post("tamaño");
			$bitacora = $this->input->post("bitacora");

			$data = array(
				"codigo" => $codigo,
				"tamaño" => $tamaño,
				"proveedor_id" => $proveedor,
				"finca_id" => $finca,
				"area_id" => $area,
				"contacto" => $contacto,
				"fabricante_id" => $fabricante,
				
				"serial_fabricante" => $serial_fabricante,
				"referencia" => $referencia,
				"bitacora" => $bitacora,
				"estado" => 1,
				"fecregistro" => date("Y-m-d H:i:s"),
				"usuario_id" => $this->session->userdata("id"),
			);

			if ($this->Monitores_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Monitor con Codigo ".$codigo);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."equipos/monitores");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."equipos/monitores/add");

			}
			
		} else {
			redirect(base_url()."equipos/monitores/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"monitor" => $this->Monitores_model->infoMonitor($id),
			"mantenimientos" => $this->Monitores_model->getMantenimientos($id)
		);

		$this->load->view("admin/monitores/view", $data);
	}
	public function delete($id){
		$monitor = $this->Monitores_model->getMonitor($id);
		$data = array(
			"estado" => "0"
		);

		$this->Monitores_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Monitor con Codigo ".$monitor->codigo);
		echo "equipos/monitores";
	}

	public function edit($id){
		$contenido_interno = array(
			"monitor" => $this->Monitores_model->getMonitor($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
			"proveedores" => $this->Proveedores_model->getProveedores(),
			"fincas" => $this->Fincas_model->getFincas(),
			"areas" => $this->Areas_model->getAreas(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/monitores/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idMonitor");
		$codigo = $this->input->post("codigo");
		$tamaño = $this->input->post("tamaño");
		$proveedor = $this->input->post("proveedor");
		$finca = $this->input->post("finca");
		$area = $this->input->post("area");
		$contacto = $this->input->post("contacto");
		$fabricante = $this->input->post("fabricante");
		$serial_fabricante = $this->input->post("serial_fabricante");
		
		$referencia = $this->input->post("referencia");
		$bitacora = $this->input->post("bitacora");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}

		$data = array(
			"codigo" => $codigo,
			"tamaño" => $tamaño,
			"proveedor_id" => $proveedor,
			"finca_id" => $finca,
			"area_id" => $area,
			"contacto" => $contacto,
			"fabricante_id" => $fabricante,
			
			"serial_fabricante" => $serial_fabricante,
			"referencia" => $referencia,
			"bitacora" => $bitacora,
			"estado" => $estado,
		);
		if ($this->Monitores_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Monitor con Codigo ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/monitores");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/monitores/edit/".$id);

		}
		
	}

	public function addmantenimiento(){
		$id = $this->input->post("idequipo");
		$fecha = $this->input->post("fecha");
		$tecnico = $this->input->post("tecnico");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"monitor_id" => $id,
			"fecha" => $fecha,
			"tecnico" => $tecnico,
			"descripcion" => $descripcion
		);

		$dataMonitor = array(
			"ultimo_mante" => $fecha
		);



		if ($this->Monitores_model->saveMante($data)) {
			$monitor = $this->Monitores_model->getMonitor($id);
			$this->backend_lib->savelog($this->modulo,"Registro de Mantenimiento al Monitor con Codigo ".$monitor->codigo);
			$this->Monitores_model->update($id,$dataMonitor);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/monitores");
		}else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/monitores");
		}

 	}

 	public function getMantenimientos(){
 		$id = $this->input->post("idequipo");
 		$mantenimientos = $this->Monitores_model->getMantenimientos($id);
 		echo json_encode($mantenimientos);
 	}


}