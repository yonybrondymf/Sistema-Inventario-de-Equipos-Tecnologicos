<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model {

	public function getOffice($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("office");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("office",$data);
	}

	public function getOff($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("office");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("office",$data);
	}


}