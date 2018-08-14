<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectores extends CI_Controller {
	private $modulo = "Proyectos";
	public function __construct(){
		parent::__construct();
		/*if (!$this->session->userdata("login")) {
			redirect(base_url());
		}*/
		$this->load->model("Proyectores_model");
		$this->load->model("Fabricantes_model");
	}

	public function index()
	{

		$contenido_interno = array(
			"proyectores" => $this->Proyectores_model->getProyectores(false,""),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proyectores/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function add(){
		$contenido_interno = array(
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proyectores/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function store(){
		if ($this->input->post("guardar")) {
			$codigo = $this->input->post("codigo");
			$modelo = $this->input->post("modelo");
			$descripcion = $this->input->post("descripcion");
			$fabricante = $this->input->post("fabricante");

			$data = array(
				"codigo" => $codigo,
				"modelo" => $modelo,
				"descripcion" => $descripcion,
				"fabricante_id" => $fabricante,
				"estado" => 1,
				"fecregistro" => date("Y-m-d H:i:s"),
				"usuario_id" => $this->session->userdata("id"),
			);

			if ($this->Proyectores_model->save($data)) {
				$this->backend_lib->savelog($this->modulo,"Inserción de nuevo Proyector con Codigo ".$codigo);
				$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
				redirect(base_url()."equipos/proyectores");
			} else {
				$this->session->set_flashdata("error", "Los datos no fueron guardados");
				redirect(base_url()."equipos/proyectores/add");

			}
			
		} else {
			redirect(base_url()."equipos/proyectores/add");
		}
		
	}

	public function view(){
		$id = $this->input->post("id");

		$data = array(
			"proyector" => $this->Proyectores_model->infoProyector($id),
			"mantenimientos" => $this->Proyectores_model->getMantenimientos($id)
		);

		$this->load->view("admin/proyectores/view", $data);
	}
	public function delete($id){
		$proyector = $this->Proyectores_model->getProyector($id);
		$data = array(
			"estado" => "0"
		);

		$this->Proyectores_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación del Proyector con Codigo ".$proyector->codigo);
		echo "equipos/proyectores";
	}

	public function edit($id){
		$contenido_interno = array(
			"proyector" => $this->Proyectores_model->getProyector($id),
			"fabricantes" => $this->Fabricantes_model->getFabricantes(),
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/proyectores/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$id = $this->input->post("idProyector");
		$codigo = $this->input->post("codigo");
		$modelo = $this->input->post("modelo");
		$descripcion = $this->input->post("descripcion");
		$fabricante = $this->input->post("fabricante");
		$estado = 1;

		if ($this->input->post("estado") ) {
			if ($this->input->post("estado") == 2) {
				$estado = 0;
			}
		}

		$data = array(
			"codigo" => $codigo,
			"modelo" => $modelo,
			"descripcion" => $descripcion,
			"fabricante_id" => $fabricante,
			"estado" => $estado,
		);
		if ($this->Proyectores_model->update($id, $data)) {
			$this->backend_lib->savelog($this->modulo,"Actualización del Proyector con Codigo ".$codigo);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/proyectores");
		} else {
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/proyectores/edit/".$id);

		}
		
	}

	public function addmantenimiento(){
		$id = $this->input->post("idequipo");
		$fecha = $this->input->post("fecha");
		$tecnico = $this->input->post("tecnico");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"proyector_id" => $id,
			"fecha" => $fecha,
			"tecnico" => $tecnico,
			"descripcion" => $descripcion
		);

		$dataProyector = array(
			"ultimo_mante" => $fecha
		);



		if ($this->Proyectores_model->saveMante($data)) {
			$proyector = $this->Proyectores_model->getProyector($id);
			$this->backend_lib->savelog($this->modulo,"Registro de Mantenimiento al Proyector con Codigo ".$proyector->codigo);
			$this->Proyectores_model->update($id,$dataProyector);
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			redirect(base_url()."equipos/proyectores");
		}else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
			redirect(base_url()."equipos/proyectores");
		}

 	}

 	public function getMantenimientos(){
 		$id = $this->input->post("idequipo");
 		$mantenimientos = $this->Proyectores_model->getMantenimientos($id);
 		echo json_encode($mantenimientos);
 	}


}