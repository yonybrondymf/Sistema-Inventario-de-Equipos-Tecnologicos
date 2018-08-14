<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

	public function getAreas($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("areas");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("areas",$data);
	}

	public function getArea($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("areas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("areas",$data);
	}


}