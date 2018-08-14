<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {
	private $modulo = "Office";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Office_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"office" => $this->Office_model->getOffice(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/office/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/office/add","",TRUE)
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

			if ($this->Office_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de un nuevo Office con el nombre ".$nombre);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/office");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/office/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/office/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"off" => $this->Office_model->getOff($id)
		);

		$this->load->view("admin/office/view", $data);
	}
	public function delete($id){
		$off = $this->Office_model->getOff($id);
		$data = array(
			"estado" => "0"
		);

		$this->Office_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Office con nombre ".$off->nombre);
		echo "configuraciones/office";
	}

	public function edit($id){
		$contenido_interno = array(
			"off" => $this->Office_model->getOff($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/office/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idOffice");
		$nombre = $this->input->post("nombre");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}

		$data = array(
			"nombre" => $nombre,
			"estado" => $estado,
		);
		if ($this->Office_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Office con nombre ".$nombre);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/office");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/office/edit/".$id);

		}
		
	}


}