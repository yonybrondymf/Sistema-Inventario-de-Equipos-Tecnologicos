<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	private $modulo = "Usuarios";
	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login(){
		$this->load->view('login');
	}

	public function logout(){
		$this->backend_lib->savelog($this->modulo,"Cierre de sesión");

		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function registro(){
		$this->load->view('registro');
	}

	public function store(){
		if ($this->input->post("registrar")) {
			$nombres = $this->input->post("nombres");
			$cedula = $this->input->post("cedula");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$confirmarpassword = $this->input->post("confirmarpassword");
			$sexo = $this->input->post("sexo");
			$imagen = "imagen_masculino.jpg";

			$this->form_validation->set_rules("email","Correo Electronico","required|valid_email|is_unique[usuarios.email]", array('is_unique' => 'El correo electronico %s ya esta en uso.'));
			$this->form_validation->set_rules("cedula","Cedula","required|is_unique[usuarios.cedula]", array('is_unique' => 'La cedula %s ya esta en uso.'));
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
			$this->form_validation->set_rules('confirmarpassword', 'Confirmacion de contraseña', 'trim|required|matches[password]');

			if ($this->form_validation->run() == false) {

				$this->registro();
				
			}else{

				if ($sexo == "F") {
					$imagen = "imagen_femenino.jpg";
				}

				$data = array(
					"nombres" => $nombres,
					"email" => $email,
					"password" => sha1($password),
					"estado" => 0,
					"sexo" => $sexo,
					"imagen" => $imagen,
					"cedula" => $cedula,
				);
				if ($this->Usuarios_model->save($data)) {
					$this->session->set_flashdata("success", "Registro Éxitoso");
					redirect(base_url()."auth/registro");
				} else {
					$this->session->set_flashdata("error", "Registro no Éxitoso");
					redirect(base_url()."auth/registro");
				}
			}

			
		}

		else{
			redirect(base_url()."auth/registro");
		}	
	}

	public function verificar(){
		if ($this->input->post("login")) {
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$res = $this->Usuarios_model->login($email, sha1($password));

			if (!$res) {
				$this->session->set_flashdata("error","Los datos no son válidos");
				redirect(base_url());
				//echo "0";
			}
			else{

				
				$data  = array(
					'id' => $res->id, 
					'nombres' => $res->nombres,
					'rol' => $res->rol_id,
					'login' => TRUE
				);
				$this->session->set_userdata($data);
				$this->backend_lib->savelog($this->modulo,"Inicio de sesión");

				redirect(base_url()."dashboard");

				
				/*if ($res->rol !=4) {
					redirect(base_url()."dashboard");
				}else{
					redirect(base_url()."usuario/perfil");
				}*/
				
				//echo "1";
			}
		}

		else{
			redirect(base_url()."auth/login");
		}
		
	}
}
