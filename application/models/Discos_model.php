<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discos_model extends CI_Model {

	public function getDiscos($estado = false){
		$this->db->select("d.*,f.nombre as fabricante");
		$this->db->from("discos d");
		$this->db->join("fabricantes f","d.fabricante_id = f.id");
		if ($estado != false) {
			$this->db->where("d.estado",1);
		}
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("discos",$data);
	}
	public function infoDisco($id){
		$this->db->select("d.*,f.nombre");
		$this->db->from("discos d");
		$this->db->join("fabricantes f", "d.fabricante_id = f.id");
		$this->db->where("d.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}
	public function getDisco($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("discos");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("discos",$data);
	}


}