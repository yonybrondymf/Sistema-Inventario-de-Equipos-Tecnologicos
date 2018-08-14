<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectores extends CI_Controller {
	private $modulo = "Lector de Barra";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Lectores_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"lectores" => $this->Lectores_model->getLectores(false,""),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/lectores/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/lectores/add",$contenido_interno,TRUE)
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

			if ($this->Lectores_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Lector con Codigo ".$codigo);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."equipos/lectores");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."equipos/lectores/add");

			}
			
		} else {
			redirect(base_url()."equipos/lectores/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"lector" => $this->Lectores_model->infoLector($id),
			"mantenimientos" => $this->Lectores_model->getMantenimientos($id)
		);

		$this->load->view("admin/lectores/view", $data);
	}
	public function delete($id){
		$lector = $this->Lectores_model->getLector($id);
		$data = array(
			"estado" => "0"
		);

		$this->Lectores_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Lector con Codigo ".$lector->codigo);
		echo "equipos/lectores";
	}

	public function edit($id){
		$contenido_interno = array(
			"lector" => $this->Lectores_model->getLector($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/lectores/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idLector");
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
		if ($this->Lectores_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Lector con Codigo ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/lectores");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/lectores/edit/".$id);

		}
		
	}

	public function addmantenimiento(){
		$id = $this->input->post("idequipo");
		$fecha = $this->input->post("fecha");
		$tecnico = $this->input->post("tecnico");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"lector_id" => $id,
			"fecha" => $fecha,
			"tecnico" => $tecnico,
			"descripcion" => $descripcion
		);

		$dataLector = array(
			"ultimo_mante" => $fecha
		);



		if ($this->Lectores_model->saveMante($data)) {
			$lector = $this->Lectores_model->getLector($id);
			$this->backend_lib->savelog($this->modulo,"Registro de Mantenimiento al Lector con Codigo ".$lector->codigo);
			$this->Lectores_model->update($id,$dataLector);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/lectores");
		}else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/lectores");
		}

 	}

 	public function getMantenimientos(){
 		$id = $this->input->post("idequipo");
 		$mantenimientos = $this->Lectores_model->getMantenimientos($id);
 		echo json_encode($mantenimientos);
 	}


}