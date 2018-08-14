<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablets extends CI_Controller {
	private $modulo = "Tablets";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Tablets_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"tablets" => $this->Tablets_model->getTablets(false,""),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/tablets/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/tablets/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$codigo = $this->input->post("codigo");
			$modelo = $this->input->post("modelo");
			$descripcion = $this->input->post("descripcion");
			$fabricante = $this->input->post("fabricante");

			$data = array(
				"codigo" => $codigo,
				"modelo" => $modelo,
				"descripcion" => $descripcion,
				"fabricante_id" => $fabricante,
				"estado" => 1,
				"fecregistro" => date("Y-m-d H:i:s"),
				"usuario_id" => $this->session->userdata("id"),
			);

			if ($this->Tablets_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Tablet con Codigo ".$codigo);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."equipos/tablets");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."equipos/tablets/add");

			}
			
		} else {
			redirect(base_url()."equipos/tablets/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"tablet" => $this->Tablets_model->infoTablet($id),
			"mantenimientos" => $this->Tablets_model->getMantenimientos($id)
		);

		$this->load->view("admin/tablets/view", $data);
	}
	public function delete($id){
		$tablet = $this->Tablets_model->getTablet($id);
		$data = array(
			"estado" => "0"
		);

		$this->Tablets_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Tablet con Codigo ".$tablet->codigo);
		echo "equipos/tablets";
	}

	public function edit($id){
		$contenido_interno = array(
			"tablet" => $this->Tablets_model->getTablet($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/tablets/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idTablet");
		$codigo = $this->input->post("codigo");
		$modelo = $this->input->post("modelo");
		$descripcion = $this->input->post("descripcion");
		$fabricante = $this->input->post("fabricante");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}

		$data = array(
			"codigo" => $codigo,
			"modelo" => $modelo,
			"descripcion" => $descripcion,
			"fabricante_id" => $fabricante,
			"estado" => $estado,
		);
		if ($this->Tablets_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Tablet con Codigo ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/tablets");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/tablets/edit/".$id);

		}
		
	}

	public function addmantenimiento(){
		$id = $this->input->post("idequipo");
		$fecha = $this->input->post("fecha");
		$tecnico = $this->input->post("tecnico");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"tablet_id" => $id,
			"fecha" => $fecha,
			"tecnico" => $tecnico,
			"descripcion" => $descripcion
		);

		$dataTablet = array(
			"ultimo_mante" => $fecha
		);



		if ($this->Tablets_model->saveMante($data)) {
			$tablet = $this->Tablets_model->getTablet($id);
			$this->backend_lib->savelog($this->modulo,"Registro de Mantenimiento al Tablet con Codigo ".$tablet->codigo);
			$this->Tablets_model->update($id,$dataTablet);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/tablets");
		}else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/tablets");
		}

 	}

 	public function getMantenimientos(){
 		$id = $this->input->post("idequipo");
 		$mantenimientos = $this->Tablets_model->getMantenimientos($id);
 		echo json_encode($mantenimientos);
 	}


}