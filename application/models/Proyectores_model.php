<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectores_model extends CI_Model {

	public function getProyectores($estado = false,$search,$fechainicio = false, $fechafinal =false){
		$this->db->select("p.*,f.nombre as fabricante,u.nombres");
		$this->db->from("proyectores p");
		$this->db->join("fabricantes f","p.fabricante_id = f.id");
		$this->db->join("usuarios u","p.usuario_id = u.id");
		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("p.fecregistro >=", $fechainicio." "."00:00:00");
			$this->db->where("p.fecregistro <=", $fechafinal." "."23:59:59");

		}
		if ($estado != false) {
			$this->db->where("p.estado",1);
		}
		$this->db->like("CONCAT(p.codigo, '', f.nombre, '',p.modelo,'',u.nombres)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoProyector($id){
		$this->db->select("p.*, fa.nombre as fabricante");
		$this->db->from("proyectores p");
		$this->db->join("fabricantes fa","p.fabricante_id = fa.id");
		$this->db->where("p.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("proyectores",$data);
	}

	public function getProyector($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("proyectores");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("proyectores",$data);
	}

	public function saveMante($data){
		return $this->db->insert("proyectores_mantenimientos",$data);
	}

	public function getMantenimientos($id){
		
		$this->db->where("proyector_id",$id);
		
		$resultados = $this->db->get("proyectores_mantenimientos");
		return $resultados->result();
	}


}