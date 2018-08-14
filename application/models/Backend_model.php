<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function countRows($table){
		
		return $this->db->get($table)->num_rows();
	}
	public function getLogs(){
		$this->db->select("l.*, u.email");
		$this->db->from("logs l");
		$this->db->join("usuarios u", "l.usuario_id = u.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function savelogs($data){
		return $this->db->insert("logs",$data);
	}
	public function getTarjetas($fecha){
		$this->db->where("tarjeta <=",$fecha);
		$resultados = $this->db->get("vehiculos");
		return $resultados->result();
	}
	public function getRevisiones($fecha){
		$this->db->where("fec_revision <=",$fecha);
		$resultados = $this->db->get("vehiculos");
		return $resultados->result();
	}
	public function getSoats($fecha){
		$this->db->where("fec_soat <=",$fecha);
		$resultados = $this->db->get("vehiculos");
		return $resultados->result();
	}
	public function getExtintores($fecha){
		$this->db->where("fec_extintor <=",$fecha);
		$resultados = $this->db->get("vehiculos");
		return $resultados->result();
	}
	public function getLicencias($fecha){
		$this->db->where("fec_licencia <=",$fecha);
		$resultados = $this->db->get("conductores");
		return $resultados->result();
	}
	public function getAlistamientos($estado,$fecha=false){
		$this->db->select("a.fch_registro, a.id, a.final_obs, v.numero,a.estado, c.nombres,c.apellidos, ua.nombres as aprueba, ua.firma as firma_a, ur.nombres as inspector, ur.firma as firma_i");
		$this->db->from("alistamientos a");
		$this->db->join("vehiculos v","a.vehiculo_id = v.id");
		$this->db->join("conductores c","a.conductor_id = c.id");
		$this->db->join("usuarios ur","a.user_registro = ur.id");
		$this->db->join("usuarios ua","a.user_aprueba = ua.id","left");
		$this->db->where("a.estado", $estado);
		if ($fecha !== false) {
			$this->db->where("a.fch_registro >=", $fecha." "."00:00:00");
			$this->db->where("a.fch_registro <=", $fecha." "."23:59:59");


		}
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function insert($table,$data)
	{
		$this->db->insert_batch($table, $data);
	}
}
