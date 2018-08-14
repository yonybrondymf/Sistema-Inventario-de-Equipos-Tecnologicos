<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antivirus_model extends CI_Model {

	public function getAntivirus($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("antivirus");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("antivirus",$data);
	}

	public function getAntivir($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("antivirus");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("antivirus",$data);
	}


}