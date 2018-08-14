<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memorias extends CI_Controller {
	private $modulo = "Memorias RAM";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Memorias_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"memorias" => $this->Memorias_model->getMemorias(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/memorias/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/memorias/add",$contenido_interno,TRUE)
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

			if ($this->Memorias_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de Memoria RAM con capacidad de ".$capacidad);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/memorias");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/memorias/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/memorias/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"memoria" => $this->Memorias_model->infoMemoria($id)
		);

		$this->load->view("admin/memorias/view", $data);
	}
	public function delete($id){
		$memoria = $this->Memorias_model->getMemoria($id);
		$data = array(
			"estado" => "0"
		);

		$this->Memorias_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Memoria RAM con capacidad de ".$memoria->capacidad);
		echo "configuraciones/memorias";
	}

	public function edit($id){
		$contenido_interno = array(
			"memoria" => $this->Memorias_model->getMemoria($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/memorias/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idMemoria");
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
		if ($this->Memorias_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización de la Memoria RAM con capacidad de ".$capacidad);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/memorias");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/memorias/edit/".$id);

		}
		
	}


}