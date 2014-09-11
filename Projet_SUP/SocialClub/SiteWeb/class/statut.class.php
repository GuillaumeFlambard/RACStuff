<?php

class Statut extends Table
{
	protected $idStatut;
	protected $idUser;
	protected $date;
	protected $content;
	
	
	public function __construct()
	{
		$this->tableName = 'statuts';
		$this->primaryKey = 'idStatut';
	}
	
	public function setidStatut($idStatut)
	{
		$this->id_statut = intval($idStatut);
	}
	
	public function getidStatut()
	{
		return $this->idStatut;
	}
	
	public function setidUser($idUser)
	{
		$this->idUser = intval($idUser);
	}
	
	public function getidUser()
	{
		return $this->idUser;
	}
	
	public function setDate($date) 
	{
		$this->date = $date;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
	public function setContent($content) 
	{
		$this->content = $content;
	}
	
	public function getContent()
	{
		return $this->content;
	}
}

?>