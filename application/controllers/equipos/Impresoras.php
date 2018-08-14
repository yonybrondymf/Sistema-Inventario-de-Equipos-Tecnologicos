<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impresoras extends CI_Controller {
	private $modulo = "Impresoras";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Impresoras_model");
		$this->load->model("Areas_model");
		$this->load->model("Fabricantes_model");
		$this->load->model("Fincas_model");
		$this->load->model("Proveedores_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"impresoras" => $this->Impresoras_model->getImpresoras(false,""),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/impresoras/list",$contenido_interno,TRUE)
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
			"contenido" => $this->load->view("admin/impresoras/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$codigo = $this->input->post("codigo");
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

			if ($this->Impresoras_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nueva Impresora con Codigo ".$codigo);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."equipos/impresoras");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."equipos/impresoras/add");

			}
			
		} else {
			redirect(base_url()."equipos/impresoras/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"impresora" => $this->Impresoras_model->infoImpresora($id),
			"mantenimientos" => $this->Impresoras_model->getMantenimientos($id)
		);

		$this->load->view("admin/impresoras/view", $data);
	}
	public function delete($id){
		$impresora = $this->Impresoras_model->getImpresora($id);
		$data = array(
			"estado" => "0"
		);

		$this->Impresoras_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Impresoras con Codigo ".$impresora->codigo);
		echo "equipos/impresoras";
	}

	public function edit($id){
		$contenido_interno = array(
			"impresora" => $this->Impresoras_model->getImpresora($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
			"proveedores" => $this->Proveedores_model->getProveedores(),
			"fincas" => $this->Fincas_model->getFincas(),
			"areas" => $this->Areas_model->getAreas(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/impresoras/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idImpresora");
		$codigo = $this->input->post("codigo");
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
		if ($this->Impresoras_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización de la Impresora con Codigo ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/impresoras");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/impresoras/edit/".$id);

		}
		
	}

	public function addmantenimiento(){
		$id = $this->input->post("idequipo");
		$fecha = $this->input->post("fecha");
		$tecnico = $this->input->post("tecnico");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"impresora_id" => $id,
			"fecha" => $fecha,
			"tecnico" => $tecnico,
			"descripcion" => $descripcion
		);

		$dataImpresora = array(
			"ultimo_mante" => $fecha
		);



		if ($this->Impresoras_model->saveMante($data)) {
			$impresora = $this->Impresoras_model->getImpresora($id);
			$this->backend_lib->savelog($this->modulo,"Registro de Mantenimiento a la Impresora con Codigo ".$impresora->codigo);
			$this->Impresoras_model->update($id,$dataImpresora);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/impresoras");
		}else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/impresoras");
		}

 	}

 	public function getMantenimientos(){
 		$id = $this->input->post("idequipo");
 		$mantenimientos = $this->Impresoras_model->getMantenimientos($id);
 		echo json_encode($mantenimientos);
 	}


}