<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas extends CI_Controller {
	private $modulo = "Fincas";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Fincas_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"fincas" => $this->Fincas_model->getFincas(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fincas/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fincas/add","",TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$nombre = $this->input->post("nombre");
			$nit = $this->input->post("nit");
			$direccion = $this->input->post("direccion");
			$telefono = $this->input->post("telefono");
			$descripcion = $this->input->post("descripcion");

			$data = array(
				"nombre" => $nombre,
				"nit" => $nit,
				"direccion" => $direccion,
				"telefono" => $telefono,
				"descripcion" => $descripcion,
				"estado" => 1
			);

			if ($this->Fincas_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de la Finca ".$nombre);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/fincas");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/fincas/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/fincas/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"finca" => $this->Fincas_model->getFinca($id)
		);

		$this->load->view("admin/fincas/view", $data);
	}
	public function delete($id){
		$finca = $this->Fincas_model->getFinca($id);
		$data = array(
			"estado" => "0"
		);

		$this->Fincas_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Finca ".$finca->nombre);
		echo "configuraciones/fincas";
	}

	public function edit($id){
		$contenido_interno = array(
			"finca" => $this->Fincas_model->getFinca($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fincas/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idFinca");
		$nombre = $this->input->post("nombre");
		$nit = $this->input->post("nit");
		$direccion = $this->input->post("direccion");
		$telefono = $this->input->post("telefono");
		$descripcion = $this->input->post("descripcion");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}
		$data = array(
			"nombre" => $nombre,
			"nit" => $nit,
			"direccion" => $direccion,
			"telefono" => $telefono,
			"descripcion" => $descripcion,
			"estado" => $estado
		);

		if ($this->Fincas_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización de la Finca ".$nombre);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/fincas");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/fincas/edit/".$id);

		}
		
	}


}