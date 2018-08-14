<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas extends CI_Controller {
	private $modulo = "Sistemas";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Sistemas_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"sistemas" => $this->Sistemas_model->getSistemas(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/sistemas/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/sistemas/add","",TRUE)
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

			if ($this->Sistemas_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción del Sistema Operativo ".$descripcion);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/sistemas");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/sistemas/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/sistemas/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"sistema" => $this->Sistemas_model->getSistema($id)
		);

		$this->load->view("admin/sistemas/view", $data);
	}
	public function delete($id){
		$sistema = $this->Sistemas_model->getSistema($id);
		$data = array(
			"estado" => "0"
		);

		$this->Sistemas_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Sistema Operativo ".$sistema->descripcion);
		echo "configuraciones/sistemas";
	}

	public function edit($id){
		$contenido_interno = array(
			"sistema" => $this->Sistemas_model->getSistema($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/sistemas/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idSistema");
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
		if ($this->Sistemas_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Sistema Operativo ".$descripcion);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/sistemas");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/sistemas/edit/".$id);

		}
		
	}


}