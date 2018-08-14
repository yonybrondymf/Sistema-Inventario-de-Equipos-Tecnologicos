<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas_model extends CI_Model {

	public function getSistemas($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("sistemas");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("sistemas",$data);
	}

	public function getSistema($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("sistemas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("sistemas",$data);
	}


}