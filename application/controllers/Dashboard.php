<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{

		$contenido_interno = array(
			"totalcomp" => $this->Backend_model->countRows("computadoras"),
			"totalimp" => $this->Backend_model->countRows("impresoras"),
			"totalmon" =>$this->Backend_model->countRows("monitores"),
			"totalusu" =>$this->Backend_model->countRows("usuarios"),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/dashboard",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

}