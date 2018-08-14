<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabricantes_model extends CI_Model {

	public function getFabricantes($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("fabricantes");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("fabricantes",$data);
	}

	public function getFabricante($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("fabricantes");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("fabricantes",$data);
	}


}