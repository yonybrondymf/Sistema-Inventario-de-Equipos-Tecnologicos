<?php

class User
{
	private $username;
	private $password;

	public function __get($var){
		return get_instance()->$var;
	}

	public function __construct($userdata){
		$this->load->library("encryption");
		$this->username = $userdata["username"];
		$this->password = $userdata["password"];
	}

	public function getUsername(){
		return $this->username;
	}

	public function getEncryptedPassword(){
		return $this->encryption->encrypt($this->password);
	}

	public function getDecryptPassword(){
		return $this->encryption->decrypt($this->getEncryptedPassword());
	}
}