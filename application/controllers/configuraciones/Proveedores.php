<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {
	private $modulo = "Proveedores";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Proveedores_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"proveedores" => $this->Proveedores_model->getProveedores(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proveedores/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proveedores/add","",TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$nombre = $this->input->post("nombre");
			$nit = $this->input->post("nit");
			$direccion = $this->input->post("direccion");
			$correo = $this->input->post("correo");
			$data = array(
				"nombre" => $nombre,
				"nit" => $nit,
				"direccion" => $direccion,
				"correo" => $correo,
				"estado" => 1
			);

			if ($this->Proveedores_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Proveedor con NIT ".$nit);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."configuraciones/proveedores");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."configuraciones/proveedores/add");

			}
			
		} else {
			redirect(base_url()."configuraciones/proveedores/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"proveedor" => $this->Proveedores_model->getProveedor($id)
		);

		$this->load->view("admin/proveedores/view", $data);
	}
	public function delete($id){
		$proveedor = $this->Proveedores_model->getProveedor($id);
		$data = array(
			"estado" => "0"
		);

		$this->Proveedores_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Proveedor con NIT ".$proveedores->nit);
		echo "configuraciones/proveedores";
	}

	public function edit($id){
		$contenido_interno = array(
			"proveedor" => $this->Proveedores_model->getProveedor($id)
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proveedores/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idProveedor");
		$nombre = $this->input->post("nombre");
		$nit = $this->input->post("nit");
		$direccion = $this->input->post("direccion");
		$correo = $this->input->post("correo");
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
			"correo" => $correo,
			"estado" => $estado
		);
		if ($this->Proveedores_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Proveedor con NIT ".$nit);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."configuraciones/proveedores");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."configuraciones/proveedores/edit/".$id);

		}
		
	}


}