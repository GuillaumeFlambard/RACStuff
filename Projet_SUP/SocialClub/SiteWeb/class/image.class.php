<?php

class Image extends Table
{
	protected $idImage;
	protected $path;
	protected $legende;
	protected $idUser;
	
	protected $user;
	
	public function __construct()
	{
		$this->tableName = 'images';
		$this->primaryKey = 'idImage';
	}
	
	public function setidImage($idImage)
	{
		$this->idImage = intval($idImage);
	}
	
	public function getidImage()
	{
		return $this->idImage;
	}
	
	public function setPath($path)
	{
		$this->path = $path;
	}
	
	public function getPath()
	{
		return $this->path;
	}
	
	public function setLegende($legende)
	{
		$this->legende = $legende;
	}
	
	public function getLegende()
	{
		return $this->legende;
	}
	
	public function setidUser($idUser)
	{
		$this->idUser = intval($idUser);
	}
	
	public function getidUser()
	{
		return intval($this->idUser);
	}
	
	public function getUser()
	{
		return $this->user;
	}
	
	public function feedMeUp($data)
	{
		parent::feedMeUp($data);
		
		if ($this->getidUser() != null)
		{
			$this->user = new User;
			$this->user->setidUser($this->getidUser());
			$this->user->hydrate();
		}
	}
}

?>