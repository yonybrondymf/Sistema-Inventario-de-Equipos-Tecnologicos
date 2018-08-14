<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memorias_model extends CI_Model {

	public function getMemorias($estado = false){
		$this->db->select("m.*,f.nombre as fabricante");
		$this->db->from("memorias m");
		$this->db->join("fabricantes f","m.fabricante_id = f.id");
		if ($estado != false) {
			$this->db->where("m.estado",1);
		}
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoMemoria($id){
		$this->db->select("m.*,f.nombre");
		$this->db->from("memorias m");
		$this->db->join("fabricantes f", "m.fabricante_id = f.id");
		$this->db->where("m.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("memorias",$data);
	}

	public function getMemoria($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("memorias");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("memorias",$data);
	}


}