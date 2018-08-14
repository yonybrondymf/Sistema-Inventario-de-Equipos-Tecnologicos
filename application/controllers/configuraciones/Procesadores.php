<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesadores extends CI_Controller {
	private $modulo = "Procesadores";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Procesadores_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"procesadores" => $this->Procesadores_model->getProcesadores(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/procesadores/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/procesadores/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$referencia = $this->input->post("referencia");
			$velocidad = $this->input->post("velocidad");
			$fabricante = $this->input->post("fabricante");

			$data = array(
				"referencia" => $referencia,
				"velocidad" => $velocidad,
				"fabricante_id" => $fabricante,
				"estado" => 1
			);

			if ($this->Procesadores_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Procesador  con velocidad de ".$velocidad);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/procesadores");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/procesadores/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/procesadores/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"procesador" => $this->Procesadores_model->infoProcesador($id)
		);

		$this->load->view("admin/procesadores/view", $data);
	}
	public function delete($id){
		
		$procesador = $this->Procesadores_model->getProcesador($id);
		$data = array(
			"estado" => "0"
		);

		$this->Procesadores_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Procesador con velocidad de ".$procesador->velocidad);
		echo "configuraciones/procesadores";
	}

	public function edit($id){
		$contenido_interno = array(
			"procesador" => $this->Procesadores_model->getProcesador($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/procesadores/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idProcesador");
		$referencia = $this->input->post("referencia");
		$velocidad = $this->input->post("velocidad");
		$fabricante = $this->input->post("fabricante");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}
		$data = array(
			"referencia" => $referencia,
			"velocidad" => $velocidad,
			"fabricante_id" => $fabricante,
			"estado" => $estado
		);
		if ($this->Procesadores_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Procesador con velocidad de ".$velocidad);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/procesadores");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/procesadores/edit/".$id);

		}
		
	}


}