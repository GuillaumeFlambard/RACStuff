<?php

class Code extends Table
{
	protected $idCode;
	protected $code;
	
	
	public function __construct()
	{
		$this->tableName = 'codes';
		$this->primaryKey = 'idCode';
	}
	
	public function setidCode($idCode)
	{
		$this->idCode = intval($idCode);
	}
	
	public function getidCode()
	{
		return $this->idCode;
	}
	
	public function setCode($code)
	{
		$this->code = $code;
	}
	
	public function getCode()
	{
		return $this->code;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}
}

?>