<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

	public function getEmpresas($estado = false, $fechainicio = false, $fechafinal = false){
		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("fecha >=", $fechainicio." "."00:00:00");
			$this->db->where("fecha <=", $fechafinal." "."23:59:59");

		}
		if ($estado !== false) {
			$this->db->where("estado", "1");
		}
		$this->db->order_by("fecha");
		$resultados = $this->db->get("empresas");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("empresas",$data);
	}

	public function getEmpresa($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("empresas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("empresas",$data);
	}


}