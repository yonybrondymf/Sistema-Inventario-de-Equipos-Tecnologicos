<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computadoras_model extends CI_Model {

	public function getComputadoras($estado = false,$search,$fechainicio = false, $fechafinal =false){
		

		$this->db->select("c.*,p.nombre as presentacion, pro.nombre as proveedor, f.nombre as finca, fa.nombre as fabricante,pr.referencia,pr.velocidad,m.capacidad as memoria,d.capacidad as disco,o.nombre as office,s.descripcion as sistema,ant.descripcion as antivirus,a.nombre as area,mo.codigo as monitor,u.nombres");
		$this->db->from("computadoras c");
		$this->db->join("monitores mo","c.monitor_id = mo.id");
		$this->db->join("presentaciones p","c.presentacion_id = p.id");
		$this->db->join("proveedores pro","c.proveedor_id = pro.id");
		$this->db->join("fincas f","c.finca_id = f.id");
		$this->db->join("fabricantes fa","c.fabricante_id = fa.id");
		$this->db->join("procesadores pr","c.procesador_id = pr.id");
		$this->db->join("memorias m","c.ram_id = m.id");
		$this->db->join("discos d","c.disco_id = d.id");
		$this->db->join("sistemas s","c.so_id = s.id");
		$this->db->join("office o","c.office_id = o.id");
		$this->db->join("antivirus ant","c.antivirus_id = ant.id");
		$this->db->join("areas a","c.area_id = a.id");
		$this->db->join("usuarios u","c.usuario_id = u.id");

		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("c.fecregistro >=", $fechainicio." "."00:00:00");
			$this->db->where("c.fecregistro <=", $fechafinal." "."23:59:59");

		}
		if ($estado != false) {
			$this->db->where("c.estado",1);
		}
		$this->db->like("CONCAT(c.codigo, '', f.nombre, '', a.nombre,'',pr.velocidad,'',d.capacidad,'',m.capacidad,'',mo.codigo,'',c.serial_so,'',u.nombres)",$search);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function infoComputadora($id){
		$this->db->select("c.*,p.nombre as presentacion, pro.nombre as proveedor, f.nombre as finca, fa.nombre as fabricante,pr.referencia,pr.velocidad,m.capacidad as memoria,d.capacidad as disco,o.nombre as office,s.descripcion as sistema,ant.descripcion as antivirus,a.nombre as area,a.nombre as area,mo.codigo as monitor");
		$this->db->from("computadoras c");
		$this->db->join("monitores mo","c.monitor_id = mo.id");
		$this->db->join("presentaciones p","c.presentacion_id = p.id");
		$this->db->join("proveedores pro","c.proveedor_id = pro.id");
		$this->db->join("fincas f","c.finca_id = f.id");
		$this->db->join("fabricantes fa","c.fabricante_id = fa.id");
		$this->db->join("procesadores pr","c.procesador_id = pr.id");
		$this->db->join("memorias m","c.ram_id = m.id");
		$this->db->join("discos d","c.disco_id = d.id");
		$this->db->join("sistemas s","c.so_id = s.id");
		$this->db->join("office o","c.office_id = o.id");
		$this->db->join("antivirus ant","c.antivirus_id = ant.id");
		$this->db->join("areas a","c.area_id = a.id");
		$this->db->where("c.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("computadoras",$data);
	}

	public function getComputadora($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("computadoras");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("computadoras",$data);
	}

	public function saveMante($data){
		return $this->db->insert("computadoras_mantenimientos",$data);
	}

	public function getMantenimientos($id){
		
		$this->db->where("computadora_id",$id);
		
		$resultados = $this->db->get("computadoras_mantenimientos");
		return $resultados->result();
	}


}