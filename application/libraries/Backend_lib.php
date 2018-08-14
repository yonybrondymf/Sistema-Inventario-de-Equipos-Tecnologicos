<?php

class Backend_lib
{

	public function __get($var)
    {
        return get_instance()->$var;
    }

	public function savelog($modulo, $descripcion){
		$data = array(
			"usuario_id" => $this->session->userdata("id"),
			"modulo" => $modulo,
			"fecha" => date("Y-m-d H:i:s"),
			"descripcion" => $descripcion,

		);

		$this->Backend_model->savelogs($data);
	}
}