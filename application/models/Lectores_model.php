<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectores_model extends CI_Model {

	public function getLectores($estado = false,$search,$fechainicio = false, $fechafinal =false){
		$this->db->select("l.*,f.nombre as fabricante,u.nombres");
		$this->db->from("lectores l");
		$this->db->join("fabricantes f","l.fabricante_id = f.id");
		$this->db->join("usuarios u","l.usuario_id = u.id");
		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("l.fecregistro >=", $fechainicio." "."00:00:00");
			$this->db->where("l.fecregistro <=", $fechafinal." "."23:59:59");

		}
		if ($estado != false) {
			$this->db->where("l.estado",1);
		}
		$this->db->like("CONCAT(l.codigo, '', f.nombre, '',l.modelo,'',u.nombres)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoLector($id){
		$this->db->select("l.*, fa.nombre as fabricante");
		$this->db->from("lectores l");
		$this->db->join("fabricantes fa","l.fabricante_id = fa.id");
		$this->db->where("l.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("lectores",$data);
	}

	public function getLector($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("lectores");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("lectores",$data);
	}

	public function saveMante($data){
		return $this->db->insert("lectores_mantenimientos",$data);
	}

	public function getMantenimientos($id){
		
		$this->db->where("lector_id",$id);
		
		$resultados = $this->db->get("lectores_mantenimientos");
		return $resultados->result();
	}


}