<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas_model extends CI_Model {

	public function getFincas($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("fincas");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("fincas",$data);
	}

	public function getFinca($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("fincas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("fincas",$data);
	}


}