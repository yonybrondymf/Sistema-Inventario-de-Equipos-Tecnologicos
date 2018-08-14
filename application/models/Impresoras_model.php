<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impresoras_model extends CI_Model {

	public function getImpresoras($estado = false,$search,$fechainicio = false, $fechafinal =false){
		$this->db->select("i.*,f.nombre as fabricante,a.nombre as area,p.nombre as proveedor,fi.nombre as finca,u.nombres");
		$this->db->from("impresoras i");
		$this->db->join("fabricantes f","i.fabricante_id = f.id");
		$this->db->join("proveedores p","i.proveedor_id = p.id");
		$this->db->join("areas a","i.area_id = a.id");
		$this->db->join("fincas fi","i.finca_id = fi.id");
		$this->db->join("usuarios u","i.usuario_id = u.id");

		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("i.fecregistro >=", $fechainicio." "."00:00:00");
			$this->db->where("i.fecregistro <=", $fechafinal." "."23:59:59");

		}
		if ($estado != false) {
			$this->db->where("i.estado",1);
		}
		$this->db->like("CONCAT(i.codigo, '', fi.nombre, '', a.nombre,'',p.nombre,u.nombres)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoImpresora($id){
		$this->db->select("i.*, pro.nombre as proveedor, f.nombre as finca, fa.nombre as fabricante,a.nombre as area");
		$this->db->from("impresoras i");
	
		$this->db->join("proveedores pro","i.proveedor_id = pro.id");
		$this->db->join("fincas f","i.finca_id = f.id");
		$this->db->join("fabricantes fa","i.fabricante_id = fa.id");

		$this->db->join("areas a","i.area_id = a.id");
		$this->db->where("i.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("impresoras",$data);
	}

	public function getImpresora($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("impresoras");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("impresoras",$data);
	}

	public function saveMante($data){
		return $this->db->insert("impresoras_mantenimientos",$data);
	}

	public function getMantenimientos($id){
		
		$this->db->where("impresora_id",$id);
		
		$resultados = $this->db->get("impresoras_mantenimientos");
		return $resultados->result();
	}


}