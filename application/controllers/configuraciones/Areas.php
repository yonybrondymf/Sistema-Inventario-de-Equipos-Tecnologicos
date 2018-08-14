<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {
	private $modulo = "Areas";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Areas_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"areas" => $this->Areas_model->getAreas(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/areas/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/areas/add","",TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$nombre = $this->input->post("nombre");

			$data = array(
				"nombre" => $nombre,
				"estado" => 1
			);

			if ($this->Areas_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción del area ".$nombre);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/areas");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/areas/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/areas/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"area" => $this->Areas_model->getArea($id)
		);

		$this->load->view("admin/areas/view", $data);
	}
	public function delete($id){
		$area = $this->Areas_model->getArea($id);
		$data = array(
			"estado" => "0"
		);

		$this->Areas_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del area ".$areas->codigo);
		echo "configuraciones/areas";
	}

	public function edit($id){
		$contenido_interno = array(
			"area" => $this->Areas_model->getArea($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/areas/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idArea");
		$nombre = $this->input->post("nombre");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}
		$data = array(
			"nombre" => $nombre,
			"estado" => $estado
		);
		if ($this->Areas_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del area ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/areas");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/areas/edit/".$id);

		}
		
	}


}