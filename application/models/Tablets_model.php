<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablets_model extends CI_Model {

	public function getTablets($estado = false,$search,$fechainicio = false, $fechafinal =false){
		$this->db->select("t.*,f.nombre as fabricante,u.nombres");
		$this->db->from("tablets t");
		$this->db->join("fabricantes f","t.fabricante_id = f.id");
		$this->db->join("usuarios u","t.usuario_id = u.id");
		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("t.fecregistro >=", $fechainicio." "."00:00:00");
			$this->db->where("t.fecregistro <=", $fechafinal." "."23:59:59");

		}
		if ($estado != false) {
			$this->db->where("t.estado",1);
		}
		$this->db->like("CONCAT(t.codigo, '', f.nombre, '',t.modelo,'',u.nombres)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoTablet($id){
		$this->db->select("t.*, fa.nombre as fabricante");
		$this->db->from("tablets t");
		$this->db->join("fabricantes fa","t.fabricante_id = fa.id");
		$this->db->where("t.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("tablets",$data);
	}

	public function getTablet($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("tablets");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("tablets",$data);
	}

	public function saveMante($data){
		return $this->db->insert("tablets_mantenimientos",$data);
	}

	public function getMantenimientos($id){
		
		$this->db->where("tablet_id",$id);
		
		$resultados = $this->db->get("tablets_mantenimientos");
		return $resultados->result();
	}


}