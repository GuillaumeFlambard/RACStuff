<?php

class User extends Table
{
	protected $idUser;
	protected $login;
	protected $password;
	protected $code;
	protected $email;
	protected $description;

	public function __construct()
	{
		$this->tableName = 'users';
		$this->primaryKey = 'idUser';
	}
	
	public function setidUser($idUser)
	{
		$this->idUser = intval($idUser);
	}
	
	public function getidUser()
	{
		return intval($this->idUser);
	}
	
	public function setLogin($login) 
	{
		$this->login = $login;
	}
	
	public function getLogin()
	{
		return $this->login;
	}
	
	public function setPassword($password) 
	{
		$this->password = $password;
	}
	
	public function getPassword()
	{
		return $this->password;
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
	
	public function setDescription($description) 
	{
		$this->description = $description;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function printUser()
	{
		var_dump($this);
	}
}

?>