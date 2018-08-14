<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesadores_model extends CI_Model {

	public function getProcesadores($estado = false){
		$this->db->select("p.*,f.nombre as fabricante");
		$this->db->from("procesadores p");
		$this->db->join("fabricantes f","p.fabricante_id = f.id");
		if ($estado != false) {
			$this->db->where("p.estado",1);
		}
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoProcesador($id){
		$this->db->select("p.*,f.nombre");
		$this->db->from("procesadores p");
		$this->db->join("fabricantes f", "p.fabricante_id = f.id");
		$this->db->where("p.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("procesadores",$data);
	}

	public function getProcesador($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("procesadores");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("procesadores",$data);
	}


}