<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabricantes extends CI_Controller {
	private $modulo = "Fabricantes";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fabricantes/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fabricantes/add","",TRUE)
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

			if ($this->Fabricantes_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción del Fabricante  ".$nombre);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/fabricantes");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/fabricantes/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/fabricantes/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"fabricante" => $this->Fabricantes_model->getFabricante($id)
		);

		$this->load->view("admin/fabricantes/view", $data);
	}
	public function delete($id){
		$fabricante = $this->Fabricantes_model->getFabricante($id);
		$data = array(
			"estado" => "0"
		);

		$this->Fabricantes_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Fabricantes ".$fabricantes->nombre);
		echo "configuraciones/fabricantes";
	}

	public function edit($id){
		$contenido_interno = array(
			"fabricante" => $this->Fabricantes_model->getFabricante($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fabricantes/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idFabricante");
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
		if ($this->Fabricantes_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Fabricante ".$nombre);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/fabricantes");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/fabricantes/edit/".$id);

		}
		
	}


}