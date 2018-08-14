<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discos extends CI_Controller {
	private $modulo = "Disco Duro";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Discos_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"discos" => $this->Discos_model->getDiscos(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/discos/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/discos/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$capacidad = $this->input->post("capacidad");
			$fabricante = $this->input->post("fabricante");

			$data = array(
				"capacidad" => $capacidad,
				"fabricante_id" => $fabricante,
				"estado" => 1
			);

			if ($this->Discos_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción del Disco Duro con capacidad de ".$capacidad);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/discos");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/discos/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/discos/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"disco" => $this->Discos_model->infoDisco($id)
		);

		$this->load->view("admin/discos/view", $data);
	}
	public function delete($id){
		$disco = $this->Discos_model->getDisco($id);
		$data = array(
			"estado" => "0"
		);

		$this->Discos_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Disco Duro con capacidad ".$disco->capacidad);
		echo "configuraciones/discos";
	}

	public function edit($id){
		
		$contenido_interno = array(
			"disco" => $this->Discos_model->getDisco($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/discos/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idDisco");
		$capacidad = $this->input->post("capacidad");
		$fabricante = $this->input->post("fabricante");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}

		$data = array(
			"capacidad" => $capacidad,
			"fabricante_id" => $fabricante,
			"estado" => $estado
		);
		if ($this->Discos_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Disco Duro con capacidad de  ".$capacidad);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/discos");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/discos/edit/".$id);

		}
		
	}


}