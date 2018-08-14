<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presentaciones_model extends CI_Model {

	public function getPresentaciones($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("presentaciones");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("presentaciones",$data);
	}

	public function getPresentacion($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("presentaciones");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("presentaciones",$data);
	}


}