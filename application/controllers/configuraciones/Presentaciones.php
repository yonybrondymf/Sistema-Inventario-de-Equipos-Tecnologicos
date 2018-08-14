<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presentaciones extends CI_Controller {
	private $modulo = "Presentaciones";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Presentaciones_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"presentaciones" => $this->Presentaciones_model->getPresentaciones(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/presentaciones/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/presentaciones/add","",TRUE)
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

			if ($this->Presentaciones_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de una nueva con Presentacion con el nombre".$nombre);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/presentaciones");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/presentaciones/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/presentaciones/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"presentacion" => $this->Presentaciones_model->getPresentacion($id)
		);

		$this->load->view("admin/presentaciones/view", $data);
	}
	public function delete($id){
		$presentacion = $this->Presentaciones_model->getPresentacion($id);
		$data = array(
			"estado" => "0"
		);

		$this->Presentaciones_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Presentacion ".$presentacion->nombre);
		echo "configuraciones/presentaciones";
	}

	public function edit($id){
		$contenido_interno = array(
			"presentacion" => $this->Presentaciones_model->getPresentacion($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/presentaciones/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idPresentacion");
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
		if ($this->Presentaciones_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización de la Presentacion ".$nombre);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/presentaciones");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/presentaciones/edit/".$id);

		}
		
	}


}